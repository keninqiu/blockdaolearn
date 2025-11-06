<?php
namespace App\Utils;

use Symfony\Component\DomCrawler\Crawler;

class NewsUtil
{
    /**
     * Parse article content from a given URL.
     *
     * @param  string  $url
     * @return array
     */
    public static function parseContent($url)
    {
        try {
            // 1. 使用 Node.js Puppeteer 抓取完整渲染后的 HTML
            $escapedUrl = escapeshellarg($url);
            $html = shell_exec("node scripts/fetch.js $escapedUrl");

            if (!$html) {
                return ['error' => 'Failed to fetch content', 'url' => $url];
            }

            $crawler = new Crawler($html);

            //echo $html;
            // 2. 基本 meta 信息
            $title = null;
            $description = null;
            $image = null;
            try {
                $title = $crawler->filter('meta[property="og:title"]')->first()->attr('content');
            } catch (\Exception $e) {}
            $title = $title ?: $crawler->filter('title')->first()->text('');

            try {
                $description = $crawler->filter('meta[name="description"]')->first()->attr('content');
            } catch (\Exception $e) {}
            $description = $description ?: optional($crawler->filter('meta[property="og:description"]')->first())->attr('content');

            try {
                $image = $crawler->filter('meta[property="og:image"]')->first()->attr('content');
            } catch (\Exception $e) {}

            // 3. 尝试 JSON-LD
            $author = null;
            $date = null;
            $content = '';

            $crawler->filter('script[type="application/ld+json"]')->each(function ($node) use (&$content, &$author, &$date) {
                $json = json_decode($node->text(), true);
                if (!is_array($json)) return;

                // 支持 Article / NewsArticle
                if (($json['@type'] ?? '') === 'NewsArticle' || ($json['@type'] ?? '') === 'Article') {
                    $author = $json['author']['name'] ?? null;
                    $date = $json['datePublished'] ?? null;
                    $content = $json['articleBody'] ?? $json['description'] ?? '';
                }
            });

            // 4. Fallback: DOM 抓正文
            if (empty($content)) {
                if (str_contains($url, 'coindesk.com')) {
                    // CoinDesk 正文在 class="document-body"
                    $crawler->filter('.document-body')->slice(0, 2)->each(function ($node) use (&$content) {

                        // 获取所有 <p> 标签
                        $node->filter('p')->each(function ($p) use (&$content) {
                            $content .= $p->text() . "\n";
                        });

                        // 获取所有 <ul> 标签
                        $node->filter('ul')->each(function ($ul) use (&$content) {
                            $ul->filter('li')->each(function ($li) use (&$content) {
                                $content .= "- " . $li->text() . "\n";
                            });
                            $content .= "\n"; // ul 后换行
                        });
                    });
                } elseif (str_contains($url, 'cointelegraph.com')) {
                    $crawler->filter('div.post-content p')->each(function ($node) use (&$content) {
                        $content .= $node->text() . "\n";
                    });
                }
            }

            return [
                'url' => $url,
                'title' => $title,
                'description' => $description,
                'image' => $image,
                'author' => $author,
                'date' => $date,
                'content' => trim($content),
            ];

        } catch (\Throwable $e) {
            return ['error' => $e->getMessage(), 'url' => $url];
        }
    }
}
