<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Backend\CategoryModel;
use App\Models\Frontend\ArticleMode;

class SingleCategoryCtrl extends Controller {

    function main(ArticleMode $articleModel, CategoryModel $catModel, Request $request) {
       
        $catInfo = $catModel->getCategoryInfo($request->catID);
        if (!isset($catInfo->id)) {
            $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
            return view('Frontend.errors.category', ['errorCode' => 'notFound'])->with('dataView', $data);
        }
        if ($catInfo->type == 'Product') {
            $page = isset($request->page) ? $request->page : 1;
            $censored = isset($request->censored) ? $request->censored : '';
            $allArticle = $articleModel->getAllArticle('Product', '', '', $censored, 0, $page, 10);
            return $this->_render_view_product($catInfo, $allArticle);
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
        $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
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
    private function _render_view_product($catInfo, $allArticle) {
        $data['catInfo'] = $catInfo;
        $data['allArticle'] = $allArticle;
        $data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
        
        #Ưu tiên view theo id chuyên mục
        $view = "Frontend.singleCategoryProduct_{$catInfo->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singleCategoryProduct';
        }

        return view($view)->with('dataView', $data);
    }

}
