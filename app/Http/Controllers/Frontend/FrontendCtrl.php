<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;
use App\Models\Frontend\FeedbackModel;

class FrontendCtrl extends Controller {

    function homePage(ArticleMode $articleModel, Request $request) {
        $data = array();
        // Tin thường
        $data['arrArticle'] = $articleModel->getAllArticle('Product', '', '', 0, 0, 1, 10);
        // Tin đảm bảo
        $data['arrArticleCensored'] = $articleModel->getAllArticle('Product', '', '', 1, 0, 1, 10);
        // Tin nổi bật
        $data['arrArticleSticky'] = $articleModel->getAllArticle('Product', '', 1, '', 0, 1, 10);

        return view('Frontend.homePage')->with('dataView', $data);
    }

    function singlePage(ArticleMode $articleModel, FeedbackModel $feedbackModel, Request $request) {
        $id = isset($request->id) ? $request->id : 0;
        // kiểm tra mã tin bài
        $check = $articleModel->checkIdArticlePublish($id, 'Product');
        if (!$check) {
            echo 'Mã tin bài không hợp lệ';
            return;
        }
        // Tin thường
        $data['arrAllFeedback'] = $feedbackModel->getAllFeedback();

        // chi tiết tin
        $data['arrSingleArticle'] = $articleModel->getArticleInfo($id);
        // tin lien quan
        $data['arrSingleArticleInvolve'] = $articleModel->getAllArticleInvolve($id, 'Product', 1, 6);
        return view('Frontend.singlePage')->with('dataView', $data);
    }

    function singleCategory() {
        return view('Frontend.singleCategory');
    }

}
