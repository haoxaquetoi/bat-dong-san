<?php

namespace App\Http\Controllers\Backend\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleMode;
use App\Models\Backend\ArticleBaseModel;


class ArticleCtrl extends Controller {


    function main(ArticleMode $artMdl) {
        $article = $artMdl::with('articleBase')->get();
   

       
        return view('backend/article/main');
    }
    function singleArticle() {
        return view('backend/article/single_article');
    }
    function singleArticleBDS() {
        return view('backend/article/single_article_bds');
    }

}
