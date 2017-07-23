<?php

namespace App\Http\Controllers\Backend\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleMode;
use App\Models\Backend\ArticleBaseModel;

class ArticleCtrl extends Controller {


    function main(ArticleMode $artMdl) {
        $article = $artMdl::with('articleBase')->get();
        
//        echo "<hr/><pre>" . __FILE__ . "<br/>";
//        var_dump($article->toArray());
//        echo "<br/></pre>" . __LINE__ . "<hr/>";

       
        return view('backend/article/main');
    }
    function singleArticle() {
        return view('backend/article/single_article');
    }
    function singleArticleBDS() {
        return view('backend/article/single_article_bds');
    }

}
