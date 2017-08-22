<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Backend\CategoryModel;
use App\Models\Frontend\ArticleMode;

class SingleCategoryCtrl extends Controller {

    function main(ArticleMode $articleModel, CategoryModel $catModel, Request $request) {

        $request->flash();
        $catInfo = $catModel->getCategoryInfo($request->catID);
        if (!isset($catInfo->id)) {
            return view('Frontend.errors.category', ['errorCode' => 'notFound'])->with('dataView', array());
        }
        if ($catInfo->type == 'Product') {
            $page = isset($request->page) ? $request->page : 1;
            $censored = isset($request->cs) ? $request->cs : '';
            $data['allArticle'] = $articleModel->getAllArticle('Product', $request->catID, '', '', $censored, 0, $page, 10);
            // thông tin chuyên mục
            $data['catInfo'] = $catInfo;
            // dữ liệu cho pagging
            $data['paginator'] = array(
                'paginator' => $data['allArticle'],
                'params' => array(
                    'cs' => $censored
                )
            );

            return $this->_render_view_product($data);
        } else {
            $data['catInfo'] = $catInfo;
            $page = isset($request->page) ? $request->page : 1;
            $data['allArticle'] = $articleModel->getAllArticle('News', $request->catID,  '', '', '', 0, $page, 4);
            // dữ liệu cho pagging
            $data['paginator'] = array(
                'paginator' => $data['allArticle'],
            );
            return $this->_render_view_news($data);
        }
    }

    /**
     * Hiển thị giao diện trường hợp là tin tức
     * @param type $catInfo
     * @return type
     */
    private function _render_view_news($data) {
        #Ưu tiên view theo id tin bài
        $view = "Frontend.singleCategoryNews_{$data['catInfo']->id}";
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
    private function _render_view_product($data) {

        #Ưu tiên view theo id chuyên mục
        $view = "Frontend.singleCategoryProduct_{$data['catInfo']->id}";
        if (!view()->exists($view)) {
            $view = 'Frontend.singleCategoryProduct';
        }

        return view($view)->with('dataView', $data);
    }

}
