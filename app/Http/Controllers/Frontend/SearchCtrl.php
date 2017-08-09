<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchCtrl extends Controller {

    function main(Request $request) {
        $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
        if ($request->type == 'News') {
            return $this->_render_view_news($data);
        } else {
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
