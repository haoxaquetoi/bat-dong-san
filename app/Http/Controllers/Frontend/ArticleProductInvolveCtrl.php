<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;
use App\Models\Frontend\FeedbackModel;

class ArticleProductInvolveCtrl extends Controller {

    function main(ArticleMode $articleModel, Request $request) {

        $request->flash();

        $artID = isset($request->artID) ? $request->artID : 0;
        $articleInfo = $articleModel->getArticleInfo($artID, TRUE);
        $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
        if (!isset($articleInfo->id)) {
            return view('Frontend.errors.post', ['errorCode' => 'notFound']);
        }

        if ($articleInfo->type == 'Product') {

            $page = isset($request->page) ? $request->page : 1;
            $censored = isset($request->cs) ? $request->cs : '';
            // danh sách tin liên quan
            $data['allArticleInvolve'] = $articleModel->getAllArticleInvolve($artID, 'Product', $page, 10, $censored);
            // dữ liệu cho pagging
            $data['paginator'] = array(
                'paginator' => $data['allArticleInvolve'],
                'params' => array(
                    'cs' => $censored
                )
            );
            return $this->_render_view_product($data);
        } else {
            $page = isset($request->page) ? $request->page : 1;
            // danh sách tin liên quan
            $data['allArticleInvolve'] = $articleModel->getAllArticleInvolve($artID, 'News', $page, 10);
            // dữ liệu cho pagging
            $data['paginator'] = array(
                'paginator' => $data['allArticleInvolve'],
                'params' => array()
            );
            return $this->_render_view_news($data);
        }
    }

    /**
     * Hiển thị giao diện trường hợp tin liên quan của tin tức
     * @param type $catInfo
     * @return type
     */
    private function _render_view_news($data) {
        return view('Frontend.listArticleInvolveNews')->with('dataView', $data);
    }

    /**
     * Hiển thị giao diện trường hợp tin iên quan của tin đăng
     * @param type $catInfo
     * @return type
     */
    private function _render_view_product($data) {

        return view('Frontend.listArticleInvolveProduct')->with('dataView', $data);
    }

}
