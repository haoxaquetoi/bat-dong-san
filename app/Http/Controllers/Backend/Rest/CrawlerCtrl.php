<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\CrawlerModel;

class CrawlerCtrl extends Controller
{

    function getAllCrawler(CrawlerModel $crawlerModel)
    {
        $crawlers = $crawlerModel->getAllCrawler();
        return response()->json($crawlers);
    }

}
