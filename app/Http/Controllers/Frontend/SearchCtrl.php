<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;

class SearchCtrl extends Controller {

    function searchArticleNews(Request $request, ArticleMode $articleModel) {
        $page = ($request->page) ? $request->page : 1;

        $data['allArticle'] = $articleModel->searchArticleNews($request, $page, 10);
        // dữ liệu cho pagging
        $data['paginator'] = array(
            'paginator' => $data['allArticle'],
            'params' => $request->request
        );
        $data['type'] = 'News';
        return view('Frontend.pageSearchNews')->with('dataView', $data);
    }

    function searchArticleProduct(Request $request, ArticleMode $articleModel) {
        $page = ($request->page) ? $request->page : 1;

        $data['allArticle'] = $articleModel->searchArticleProduct($request, $page, 10);
        // dữ liệu cho pagging
        $data['paginator'] = array(
            'paginator' => $data['allArticle'],
            'params' => $request->request
        );
        return view('Frontend.pageSearchProduct')->with('dataView', $data);
    }

}
