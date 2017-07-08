<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use DB;
use Goutte\Client;
use App\Models\Backend\CrawlerModel;
use App\Models\Backend\CrawlerItemModel as CrawlerItemModel;
use App\Models\Backend\CrawlerConfigModel as CrawlerConfigModel;

class consoleCrawler extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lấy tin tự động';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(CrawlerModel $crlMdl, CrawlerItemModel $crlIMdl, CrawlerConfigModel $crlCMdl) {
        $config = $this->_load_config($crlMdl, $crlCMdl);
        $website_uri = $config->website_url;
        $website_uri = rtrim($website_uri, '/');
        $cat_uri = $config->cat_uri;
        $xpath = $config->xpath;
        $cat_uri = ltrim($cat_uri, '/');
        $reqUri = "$website_uri/$cat_uri";
        $columns = $config->columns;
        $singlePostXpath = $config->detail_post_xpath;

        $client = new Client();
        $client->setHeader('user-agent', "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
        $crawler = $client->request('GET', $reqUri);


        $crawler->filter($xpath)->each(function($node) use ($website_uri, $client, $columns, $crlIMdl, $singlePostXpath) {
            $post_url = trim($node->filter($singlePostXpath)->attr('href'));
            $post_url = ltrim($post_url, '/');
            $post_url = "$website_uri/$post_url";
            DB::beginTransaction();
            $crawlerPost = $client->request('GET', $post_url);
            foreach ($columns as $columnCode => $xpath) {
                $crlIMdl::insertGetId([
                    'uri' => $post_url,
                    'column_name' => $columnCode,
                    'value' => $crawlerPost->filter($xpath)->text()
                ]);
            }
            DB::commit();
        });
    }

    private function _load_config(CrawlerModel $crlMdl, CrawlerConfigModel $crlCMdl) {

        //Load all website
        $websites = $crlMdl->getAllCrawler(0, $load_category_config = true);
        foreach ($websites as &$websiteInfo) {
            $arrConfig = $crlCMdl::where([['crawler_id', '=', $websiteInfo->id]])->get();
            if (!isset($arrConfig[0])) {
                continue;
            }

            $websiteInfo['xpath'] = $arrConfig[0]->category_xpath;
            $websiteInfo['cat_id'] = $arrConfig[0]->category_id;
            $websiteInfo['cat_uri'] = $arrConfig[0]->url;
            $websiteInfo['detail_post_xpath'] = $arrConfig[0]->detail_post_xpath;
            $columns = [];
            foreach ($arrConfig as $config) {
                if (!isset($config->column_name)) {
                    continue;
                }
                $columns[$config->column_name] = $config->xpath;
            }
        }
        $websiteInfo ['columns'] = $columns;
        return $websiteInfo;
    }

}
