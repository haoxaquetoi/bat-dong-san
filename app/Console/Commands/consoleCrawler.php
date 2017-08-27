<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use DB;
use Goutte\Client;

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
    public function handle() {

        $code = 'bds1';
        $arrWebConfig = app('SettingCrawler')->arrWebsiteGetData[$code];


        $arrAllConfig = DB::table('crawler_config')->where('website_code', $code)->get();
        for ($j = 0; $j < count($arrAllConfig); $j ++) {
            $arrConfig = $arrAllConfig[$j];

            $arrConfig->value = json_decode($arrConfig->value, true);


            //Load danh sách tin
            $urlGetListPost = rtrim($arrConfig->value['txtUrlCat'], '/');

            $singlePostXpath = $arrConfig->value['xpathDetailPost'];


            $client = new Client();
            $client->setHeader('user-agent', "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
            $crawler = $client->request('GET', $urlGetListPost);
            $crawler->filter($singlePostXpath)->each(function($node) use ($urlGetListPost, $client, $arrConfig, $arrWebConfig, $singlePostXpath) {
                $post_url = rtrim($node->attr('href'), '/');
                $post_url = $arrWebConfig['url'] . '/' . $post_url;
                //Load detail post by url $post_url
                $crawlerPost = $client->request('GET', $post_url);
                DB::beginTransaction();
                //Lấy danh sách thông tin chính
                $arrInsertContent = [];
                foreach ($arrConfig->value['content'] as $columnCode => $xpath) {
                    $arrInsertContent[$columnCode] = NULL;
                    if (trim($xpath) != '') {
                        $arrInsertContent[$columnCode] = $crawlerPost->filter($xpath)->text();
                    }
                }
                //Kiểm tra nếu tin bài tồn tại thì chuyển sang tin tiếp theo
                $countPost = DB::table('article')->where('parent_url', $urlGetListPost)->count();
                if ($countPost == 0) {
                    $slug = str_slug($arrInsertContent['title']);
                    //Check nếu slug tồn tại => tự động tạo slug khác
                    $countPost = DB::table('article')->where('slug', $slug)->count();
                    if ($countPost > 0) {
                        $slug = $slug . '_' . uniqid();
                    }

                    $postTmpID = DB::table('article')->insertGetId([
                        'title' => $arrInsertContent['title'],
                        'slug' => $slug,
                        'type' => 'Product',
                        'content' => $arrInsertContent['content'],
                        'thumbnail' => $arrInsertContent['thumbnail'],
                        'is_sticky' => (int) $arrInsertContent['is_sticky'],
                        'is_censored' => (int) $arrInsertContent['is_censored'],
                        'is_sold' => (int) $arrInsertContent['is_sold'],
                        'begin_date' => $arrInsertContent['begin_date'],
                        'end_date' => $arrInsertContent['end_date'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'parent_url' => $post_url,
                        'crawlerPublish' => 0
                    ]);
                    DB::table('category_article')->insertGetId([
                        'category_id' => $arrConfig->category_id,
                        'article_id' => $postTmpID
                    ]);


                    $arrInsertBase = [];
                    foreach ($arrConfig->value['base'] as $columnCode => $xpath) {
                        $arrInsertBase[$columnCode] = NULL;

                        if (trim($xpath) != '') {

                            if ($columnCode == 'city_id') {
                                $arrInsertBase[$columnCode] = $crawlerPost->filter($xpath)->text();
                                if (
                                        isset($arrWebConfig['mappAddress']) && isset($arrWebConfig['mappAddress']['city']) && isset($arrWebConfig['mappAddress']['city']['mapp']) && isset($arrWebConfig['mappAddress']['city']['mapp']['id'])
                                ) {
                                    $arrInsertBase[$columnCode] = $arrWebConfig['mappAddress']['city']['mapp']['id'];
                                } else {
                                    trigger_error('Mã tỉnh/thành phố cấu hình mapp không hợp lệ');
                                }
                            } elseif ($columnCode == 'district_id') {
                                
                            } else {
                                $arrInsertBase[$columnCode] = $crawlerPost->filter($xpath)->text();
                            }
                        }
                    }
                    DB::table('article_base')->insertGetId([
                        'article_id' => $postTmpID,
                        'city_id' => $arrInsertBase['city_id'],
                        'district_id' => $arrInsertBase['district_id'],
                        'village_id' => $arrInsertBase['village_id'],
                        'street_id' => $arrInsertBase['street_id'],
                        'address' => $arrInsertBase['address'],
                        'price' => intval($arrInsertBase['price']),
                        'myself' => ($arrInsertBase['myself'] == '1') ? '1' : '0'
                    ]);

                    $arrInsertOther = [];
                    foreach ($arrConfig->value['other'] as $columnCode => $xpath) {
                        $arrInsertOther[$columnCode] = NULL;
                        if (trim($xpath) != '') {
                            $arrInsertOther[$columnCode] = $crawlerPost->filter($xpath)->text();
                        }


                        if ($columnCode == 'entry_width') {
                            $arrInsertOther[$columnCode] = (int) $arrInsertOther[$columnCode];
                        }
                        
                        
                    }
                    DB::table('article_other')->insertGetId([
                        'article_id' => $postTmpID,
                        'facade' => $arrInsertOther['facade'],
                        'entry_width' => $arrInsertOther['entry_width'],
                        'house_direction' => $arrInsertOther['house_direction'],
                        'balcony_direction' => $arrInsertOther['balcony_direction'],
                        'number_of_storeys' => $arrInsertOther['number_of_storeys'],
                        'number_of_wc' => intval($arrInsertOther['number_of_wc']),
                        'number_of_bedrooms' => intval($arrInsertOther['number_of_bedrooms']),
                        'furniture' => $arrInsertOther['furniture'],
                        'floor_area' => intval($arrInsertOther['floor_area'])
                    ]);

                    $arrInsertContact = [];
                    foreach ($arrConfig->value['contact'] as $columnCode => $xpath) {
                        $arrInsertContact[$columnCode] = NULL;
                        if (trim($xpath) != '') {
                            $arrInsertContact[$columnCode] = $crawlerPost->filter($xpath)->text();
                        }
                    }
                    DB::table('article_contact')->insertGetId([
                        'article_id' => $postTmpID,
                        'name' => $arrInsertContact['name'],
                        'address' => $arrInsertContact['address'],
                        'phone' => $arrInsertContact['phone'],
                        'mobile' => $arrInsertContact['mobile'],
                        'email' => $arrInsertContact['email']
                    ]);
                }
                DB::commit();
            });
        }
    }

}
