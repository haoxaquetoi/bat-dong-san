<?php

namespace App\Modules\Backend\Crawler;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CrawlerCtrl extends BaseController
{

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    function __construct()
    {
        ;
    }

    function index()
    {
        return view('crawler', []);
    }

}
