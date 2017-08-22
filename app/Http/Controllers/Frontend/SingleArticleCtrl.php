<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;
use App\Models\Frontend\FeedbackModel;

class SingleArticleCtrl extends Controller {

    function main(ArticleMode $articleModel, Request $request) {

        $artID = isset($request->artID) ? $request->artID : 0;

        $articleInfo = $articleModel->getArticleInfo($artID, TRUE);

        if (!isset($articleInfo->id)) {
            return view('Frontend.errors.post', ['errorCode' => 'notFound']);
        }
        
        if ($articleInfo->type == 'Product') {
            // tin liên quan
            $articleInvolve = $articleModel->getAllArticleInvolve($artID, 'Product', 1, 6);
            return $this->_render_view_product($articleInfo, $articleInvolve);
        } else {
            // tin liên quan
            $articleInvolve = $articleModel->getAllArticleInvolve($artID, 'News', 1, 10);
            return $this->_render_view_news($articleInfo, $articleInvolve);
        }
    }

    /**
     * Hiển thị giao diện trường hợp là tin tức
     * @param type $articleInfo
     * @return type
     */
    private function _render_view_news($articleInfo, $articleInvolve) {
        $data['arrSingleArticle'] = $articleInfo;
        // tin lien quan
        $data['arrSingleArticleInvolve'] = $articleInvolve;
        #Ưu tiên view theo id tin bài
        $view = "Frontend.singlePostNews_{$articleInfo->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singlePostNews';
        }
        return view($view)->with('dataView', $data);
    }

    /**
     * Hiển thị giao diện trường hợp là tin đăng
     * @param type $articleInfo
     * @return type
     */
    private function _render_view_product($articleInfo, $articleInvolve) {
        $instanceFeedModel = new FeedbackModel;
        $data['arrSingleArticle'] = $articleInfo;
        $data['arrAllFeedback'] = $instanceFeedModel->getAllFeedback();
        // tin lien quan
        $data['arrSingleArticleInvolve'] = $articleInvolve;

//        dd($data['arrSingleArticleInvolve']);
        #Ưu tiên view theo id tin bài
        $view = "Frontend.singlePostProduct_{$articleInfo->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singlePostProduct';
        }

        return view($view)->with('dataView', $data);
    }

}
