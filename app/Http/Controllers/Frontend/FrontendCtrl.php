<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;

class FrontendCtrl extends Controller {

    function homePage(ArticleMode $articleModel, Request $request) {
        $data = array();
        $freeText = $request->freeText;
        // Tin thường
        $data['arrArticle'] = $articleModel->getAllArticle($freeText, '', 0, 1, 10);
        // Tin đảm bảo
        $data['arrArticleCensored'] = $articleModel->getAllArticle($freeText, '', 1, 1, 10);
        // Tin nổi bật
        $data['arrArticleSticky'] = $articleModel->getAllArticle($freeText, 1, '', 1, 10);
//        return response()->json($data);
        return view('Frontend.homePage')->with('dataView', $data);
    }

    function singlePage() {
        return view('Frontend.singlePage');
    }

    function singleCategory() {
        return view('Frontend.singleCategory');
    }

}
