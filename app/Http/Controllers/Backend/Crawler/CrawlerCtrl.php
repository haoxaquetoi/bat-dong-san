<?php

namespace App\Http\Controllers\Backend\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrawlerCtrl extends Controller
{

    /**
     * Hien thi cac tin đã lấy
     */
    function index()
    {
          return view('backend/crawler/main');
    }

    /**
     * Cấu hình lấy tin
     */
    function configCrawler()
    {
        echo 'configCrawler';
    }

    /**
     * Cấu hình lọc tin
     */
    function configFilter()
    {
        
    }

}
