<?php

namespace App\Http\Controllers\Backend\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\CrawlerConfigModel;
use App\Models\Backend\CategoryModel;
use DB;

class CrawlerCtrl extends Controller {

    /**
     * Hien thi cac tin đã lấy
     */
    function index() {
        return view('backend/crawler/main');
    }

    /**
     * Cấu hình lấy tin
     */
    function configCrawler(CategoryModel $catModel, Request $request) {
        $id = $request->id;
        $viewData['crawlerInfo'] = $this->crawlerInfo = DB::table('crawler')->find($id);
        $category = $catModel->getAllCat(0);
        $viewData['category'] = collect($category);
        return view('backend/crawler/single_config', $viewData);
    }

    /**
     * Cấu hình lọc tin
     */
    function configFilter() {
        
    }

}
