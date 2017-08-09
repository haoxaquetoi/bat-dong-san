<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Backend\CategoryModel;

class SingleCategoryCtrl extends Controller {

    function main(CategoryModel $catModel, Request $request) {

        $catInfo = $catModel->getCategoryInfo($request->catID);
        if (!isset($catInfo->id)) {
            return view('Frontend.errors.category', ['errorCode' => 'notFound']);
        }
        if ($catInfo->type == 'Product') {
            return $this->_render_view_product($catInfo);
        } else {
            return $this->_render_view_news($catInfo);
        }
    }

    /**
     * Hiển thị giao diện trường hợp là tin tức
     * @param type $catInfo
     * @return type
     */
    private function _render_view_news($catInfo) {
        $data['catInfo'] = $catInfo;

        #Ưu tiên view theo id tin bài
        $view = "Frontend.singleCategoryNews_{$catInfo->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singleCategoryNews';
        }
        return view($view)->with('dataView', $data);
    }

    /**
     * Hiển thị giao diện trường hợp là tin đăng
     * @param type $catInfo
     * @return type
     */
    private function _render_view_product($catInfo) {
        $data['catInfo'] = $catInfo;

        #Ưu tiên view theo id tin bài
        $view = "Frontend.singleCategoryProduct_{$catInfo->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singleCategoryProduct';
        }

        return view($view)->with('dataView', $data);
    }

}
