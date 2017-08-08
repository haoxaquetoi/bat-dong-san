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
            return $this->_render_view_product($articleInfo);
        } else {
            return $this->_render_view_news($articleInfo);
        }
    }

    /**
     * Hiển thị giao diện trường hợp là tin tức
     * @param type $articleInfo
     * @return type
     */
    private function _render_view_news($articleInfo) {
        $data['arrSingleArticle'] = $articleInfo;

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
    private function _render_view_product($articleInfo) {
        $instanceFeedModel = new FeedbackModel;
        $data['arrSingleArticle'] = $articleInfo;
        $data['arrAllFeedback'] = $instanceFeedModel->getAllFeedback();

        #Ưu tiên view theo id tin bài
        $view = "Frontend.singlePostProduct_{$articleInfo->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singlePostProduct';
        }

        return view($view)->with('dataView', $data);
    }

}
