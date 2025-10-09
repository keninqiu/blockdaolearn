<?php
namespace App\Schedulers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GenerateNewsAgent {

    protected Client $http;
    protected array $sources;

    public function __construct()
    {
        $this->http = new Client([
            'timeout' => 10,
            'headers' => [
                'User-Agent' => 'NCC-News-Agent/1.0 (+https://yourdomain.example)'
            ]
        ]);

        // Configurable list of sources. You can move to config/news.php or .env
        $this->sources = [
            // key => [type, url, optional selectors]
            'coindesk' => [
                'type' => 'rss',
                'url' => 'https://www.coindesk.com/arc/outboundfeeds/rss/?outputType=xml'
            ],
            'cointelegraph' => [
                'type' => 'rss',
                'url' => 'https://cointelegraph.com/rss'
            ],
            'theblock' => [
                'type' => 'rss',
                'url' => 'https://www.theblock.co/latest.rss'
            ],
            // add more sources or HTML type scrapers as needed
        ];
    }

    public function __invoke()
    {
        foreach ($this->sources as $sourceName => $spec) {
            try {
                if ($spec['type'] === 'rss') {
                    $this->processRss($sourceName, $spec['url']);
                } else {
                    // placeholder for html parsing sources
                    $this->processHtml($sourceName, $spec['url'], $spec['selectors'] ?? []);
                }
            } catch (\Throwable $e) {
                // log but continue processing other sources
                logger()->error("GenerateNewsAgent error for {$sourceName}: " . $e->getMessage());
            }
        }        
    }

    protected function processRss(string $source, string $url)
    {
        try {
            $resp = $this->http->get($url);
            $body = (string) $resp->getBody();
        } catch (RequestException $e) {
            logger()->warning("RSS fetch failed for {$source}: " . $e->getMessage());
            return;
        }

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($body, 'SimpleXMLElement', LIBXML_NOCDATA);
        if (! $xml) {
            logger()->warning("Failed parsing RSS XML from {$source}");
            return;
        }

        // RSS may be <rss><channel><item> or atom feed with <entry>
        if (isset($xml->channel->item)) {
            $items = $xml->channel->item;
        } elseif (isset($xml->entry)) {
            $items = $xml->entry;
        } else {
            $items = $xml->item ?? [];
        }

        foreach ($items as $item) {
            $title = (string) ($item->title ?? $item->children()->title ?? '');
            $link = (string) ($item->link ?? $item->children()->link ?? '');
            // RSS <link> might be an object with href attribute
            if (is_object($link) && isset($link['href'])) {
                $link = (string) $link['href'];
            }

            $pubDate = (string) ($item->pubDate ?? $item->published ?? $item->updated ?? '');
            $description = (string) ($item->description ?? $item->summary ?? '');

            if (empty($title) || empty($link)) {
                continue;
            }

            $this->upsertNews($source, $title, $link, $description, $pubDate);
        }
    }

    protected function processHtml(string $source, string $url, array $selectors = [])
    {
        // Optional: implement HTML scraping by CSS selectors using DOMDocument + XPath or a lightweight package
        // For now we fetch the page and try to extract <article> and <a> headlines
        try {
            $resp = $this->http->get($url);
            $html = (string) $resp->getBody();
        } catch (\Throwable $e) {
            logger()->warning("HTML fetch failed for {$source}: " . $e->getMessage());
            return;
        }

        // very simple approach: find <a> tags that look like article links
        preg_match_all('/<a[^>]+href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $html, $matches, PREG_SET_ORDER);
        $collected = [];
        foreach ($matches as $m) {
            $href = html_entity_decode($m[1]);
            $text = strip_tags($m[2]);
            $text = trim($text);
            if (strlen($text) < 20) continue; // skip tiny links
            // make absolute URL if needed
            if (Str::startsWith($href, '/')) {
                $host = parse_url($url, PHP_URL_SCHEME) . '://' . parse_url($url, PHP_URL_HOST);
                $href = rtrim($host, '/') . $href;
            }
            // naive de-dup
            if (isset($collected[$href])) continue;
            $collected[$href] = $text;
        }

        foreach ($collected as $href => $text) {
            $this->upsertNews($source, $text, $href, null, null);
        }
    }

    protected function upsertNews(string $source, string $title, string $url, ?string $description, $pubDateRaw)
    {
        $title = trim($title);
        $url = trim($url);

        // ignore some noisy common cases
        if (stripos($title, 'advertisement') !== false) return;

        // dedupe by url or title
        /*
        $exists = News::where('url', $url)->orWhere('title', $title)->first();
        if ($exists) {
            // you may update fields if needed
            return;
        }
        */

        // fetch raw content to create a short summary (optional, light)
        $raw = null;
        try {
            $resp = $this->http->get($url, ['timeout' => 6]);
            $raw = (string) $resp->getBody();
        } catch (\Throwable $e) {
            // not fatal — we still create an entry using the provided description
            logger()->debug("Failed to fetch article body for {$url}: " . $e->getMessage());
        }

        $summary = $this->makeSummary($description, $raw);

        // parse published date
        $publishedAt = null;
        try {
            if (!empty($pubDateRaw)) {
                $publishedAt = Carbon::parse($pubDateRaw);
            }
        } catch (\Throwable $e) {
            $publishedAt = null;
        }

        Log::info('title is:' . $title);
        Log::info('description is:' . $description);
        Log::info('url is:' . $url);
        Log::info('raw is:' . $raw);
        /*
        // store
        $slug = News::generateSlug($title);
        News::create([
            'source' => $source,
            'title' => $title,
            'slug' => $slug,
            'summary' => $summary,
            'url' => $url,
            'raw_content' => $this->truncate($raw, 10000),
            'published_at' => $publishedAt,
        ]);
        */

    }

    protected function makeSummary(?string $description, ?string $raw): string
    {
        // Priority: short RSS description -> extract first paragraph from raw -> fallback to title
        if (!empty($description)) {
            return $this->shorten($this->cleanText($description), 300);
        }
        if (!empty($raw)) {
            // try to extract the first meaningful paragraph from HTML
            $firstPara = $this->extractFirstParagraph($raw);
            if ($firstPara) return $this->shorten($firstPara, 300);
        }
        return '';
    }

    protected function extractFirstParagraph(string $html): ?string
    {
        // Use DOMDocument to find first <p> with some text.
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        if (@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html) === false) {
            return null;
        }
        $paras = $dom->getElementsByTagName('p');
        foreach ($paras as $p) {
            $text = trim($p->textContent);
            if (strlen($text) >= 50) {
                return $this->cleanText($text);
            }
        }
        // fallback: find first meaningful text node
        $body = $dom->getElementsByTagName('body')->item(0);
        if ($body) {
            $text = trim($body->textContent);
            if (strlen($text) > 0) {
                return $this->shorten($this->cleanText($text), 300);
            }
        }
        return null;
    }

    protected function cleanText(string $s): string
    {
        $s = html_entity_decode($s);
        $s = preg_replace('/\s+/', ' ', $s);
        $s = strip_tags($s);
        return trim($s);
    }

    protected function shorten(string $s, int $max = 300): string
    {
        if (mb_strlen($s) <= $max) return $s;
        $cut = mb_substr($s, 0, $max);
        // try to cut at last sentence boundary
        if (preg_match('/^(.+?[.!?])\s.*$/u', $cut, $m)) {
            return trim($m[1]);
        }
        return rtrim(mb_substr($cut, 0, mb_strrpos($cut, ' '))) . '…';
    }

    protected function truncate(?string $s, int $max = 10000): ?string
    {
        if ($s === null) return null;
        return mb_substr($s, 0, $max);
    }    
}