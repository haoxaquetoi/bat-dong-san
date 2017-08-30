<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;

class FrontendCtrl extends Controller {

    function homePage(ArticleMode $articleModel) {

        $data = array();
        // Tin thường
        $data['arrArticle'] = $articleModel->getAllArticle('Product','' , '', '', 0, 0, 1, 10);
        // Tin đảm bảo
        $data['arrArticleCensored'] = $articleModel->getAllArticle('Product', '', '', '', 1, 0, 1, 10);
        // Tin nổi bật
        $data['arrArticleSticky'] = $articleModel->getAllArticle('Product', '', '', 1, '', 0, 1, 12);
        return view('Frontend.homePage')->with('dataView', $data);
    }

}
