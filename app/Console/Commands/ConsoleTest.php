<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Schedulers\GenerateNewsAgent;
use App\Utils\ChatGPTUtil;
use App\Utils\NewsUtil;

class ConsoleTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:console-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $url1 = 'https://www.coindesk.com/markets/2025/10/11/coinbase-s-upcoming-amex-card-with-btc-cashback-everything-we-know-so-far';
        //$url2 = 'https://cointelegraph.com/news/hyperliquid-21m-private-key-exploit-defi-security?utm_source=rss_feed&utm_medium=rss&utm_campaign=rss_partner_inbound';

        $result1 = NewsUtil::parseContent($url1);
        //$result2 = NewsUtil::parseContent($url2);

        echo json_encode($result1);
        //echo json_encode($result2);
        /*
        $text = 'Forward Industries launches Solana validator, almost $1.7B SOL staked';
        $translated = ChatGPTUtil::rewriteToChinese($text);
        echo $translated;
        */
        /*
        $obj = new GenerateNewsAgent;
        $obj();
        */
    }
}
