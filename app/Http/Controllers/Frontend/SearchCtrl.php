<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;

class SearchCtrl extends Controller {

    function main(Request $request, ArticleMode $articleModel) {
        $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
        if ($request->type == 'News') {
            return $this->_render_view_news($data);
        } else {
            $page = ($request->page) ? $request->page : 1;
            
            $data['allArticle'] = $articleModel->searchArticleProduct($request, $page, 10);
            // dữ liệu cho pagging
            $data['paginator'] = array(
                'paginator' => $data['allArticle'],
                'params' => $request->request
            );
            return $this->_render_view_product($data);
        }
    }

    private function _render_view_news($data) {
        return view('Frontend.pageSearchNews')->with('dataView', $data);
    }

    /**
     * Hiển thị giao diện trường hợp là tin đăng
     * @param type $catInfo
     * @return type
     */
    private function _render_view_product($data) {
        return view('Frontend.pageSearchProduct')->with('dataView', $data);
    }

}
