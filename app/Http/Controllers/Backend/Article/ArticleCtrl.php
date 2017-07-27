<?php

namespace App\Http\Controllers\Backend\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleMode;
use App\Models\Backend\ArticleBaseModel;


class ArticleCtrl extends Controller {


    function main(ArticleMode $artMdl) {
//        $article = $artMdl::with('articleBase')->get();
        return view('backend/article/mainArticle');
    }
    
    function all() {
        return view('backend/article/listArticle');
    }
    
    function singleArticleNews() {
        return view('backend/article/singleArticleNews');
    }
    function singleArticleProduct() {
        return view('backend/article/singleArticleProduct');
    }

}
