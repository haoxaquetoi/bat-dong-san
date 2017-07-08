<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use Goutte\Client;

class crawlerCtrl extends Command {

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
        $client = new Client();
        $client->setHeader('user-agent', "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36");
        $crawler = $client->request('GET', 'http://batdongsan.com.vn/nha-dat-ban');
        $crawler->filter('.container-default .Main .search-productItem')->each(function($node) {
            $title = trim($node->filter('.p-title h3 a')->text());
            print_r("\n".$title);
        });
    }

}
