<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;
use App\Models\Frontend\FeedbackModel;

class FrontendCtrl extends Controller {

    function homePage(ArticleMode $articleModel, Request $request) {
  
        $data = array();
        $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
        // Tin thường
        $data['arrArticle'] = $articleModel->getAllArticle('Product', '', '', 0, 0, 1, 10);
        // Tin đảm bảo
        $data['arrArticleCensored'] = $articleModel->getAllArticle('Product', '', '', 1, 0, 1, 10);
        // Tin nổi bật
        $data['arrArticleSticky'] = $articleModel->getAllArticle('Product', '', 1, '', 0, 1, 10);

        return view('Frontend.homePage')->with('dataView', $data);
    }
}
