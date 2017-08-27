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
        return view('Backend/crawler/main',[]);
    }

    /**
     * Cấu hình lấy tin
     */
    function configCrawler(CategoryModel $catModel, Request $request) {

        $id = $request->id;
        $catID = $request->catID;
        $viewData['crawlerInfo'] = (isset(app('SettingCrawler')->arrWebsiteGetData[$id])) ? app('SettingCrawler')->arrWebsiteGetData[$id] : [];
        $viewData['websiteCode'] = $id;
        if (!is_array($viewData['crawlerInfo']) || count($viewData['crawlerInfo']) == 0) {
            dd('Mã nguồn lấy tin không hợp lệ');
        }
        $category = $catModel->getAllCat(0);
        $viewData['category'] = collect($category);
        $viewData['config'] = DB::table('crawler_config')->where('website_code', $id)->where('category_id',$catID)->first();
        if (isset($viewData['config']->value)) {
            $viewData['config']->value = json_decode($viewData['config']->value, true);
        }
        return view('Backend/crawler/single_config', $viewData);
    }

    /**
     * Cấu hình lọc tin
     */
    function updateCrawler(Request $request) {

        $websiteCode = $request->websiteCode;
        $crawlerInfo = (isset(app('SettingCrawler')->arrWebsiteGetData[$websiteCode])) ? app('SettingCrawler')->arrWebsiteGetData[$websiteCode] : [];
        if (!is_array($crawlerInfo) || count($crawlerInfo) == 0) {
            dd('Mã nguồn lấy tin không hợp lệ');
        }
        $selCategoryID = $request->selCategoryID;

        $value = [];
        $value['txtUrlCat'] = $request->txtUrlCat;
        $value['xpathDetailPost'] = $request->xpathDetailPost;
        
        $SettingCrawler = app('SettingCrawler')->getColumnConfig();
        $value['content'] = $SettingCrawler['content'];
        $value['base'] = $SettingCrawler['base'];
        $value['contact'] = $SettingCrawler['contact'];
        $value['slide'] = $SettingCrawler['slide'];
        $value['other'] = $SettingCrawler['other'];

        foreach ($value['content'] as $key => &$val) {
            $val = $request->{$key};
        }
        foreach ($value['base'] as $key => &$val) {
            $val = $request->{$key};
        }
        foreach ($value['contact'] as $key => &$val) {
            $val = $request->{$key};
        }
        foreach ($value['other'] as $key => &$val) {
            $val = $request->{$key};
        }
        foreach ($value['slide'] as $key => &$val) {
            $val = $request->{$key};
        }

        DB::table('crawler_config')->where('website_code', $websiteCode)->where('category_id', $selCategoryID)->delete();
        DB::table('crawler_config')->insert([
            'website_code' => $websiteCode,
            'category_id' => $selCategoryID,
            'value' => json_encode($value)
        ]);
        return back()->withInput();
    }

}
