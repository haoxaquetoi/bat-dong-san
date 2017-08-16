<?php

namespace App\Libs\Config;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\ArticleModel;
use App\Models\Backend\CategoryArticleModel;

class MenuConfig{
    
    private $menuType;
    
    function __construct() {
        $this->menuType = [
            'url' => 'url',
            'article' => 'Tin bài',
            'category' => 'Chuyên mục',
        ];
    }
    
    function getMenuType(){
        return $this->menuType;
    }
    
    function buildHref($type, $data){
        $href = '';
        switch ($type){
            case 'url':
                $href = url(urldecode($data->url));
                break;
            case 'article':
                $articleInfo = ArticleModel::find($data->articleID);
                $categoryArticleInfo = CategoryArticleModel::where('article_id', $articleInfo->id)->first();
                $categoryInfo = CategoryModel::find($categoryArticleInfo->category_id);
                $href = route('frontendArticle', [
                    'catSlug' => $categoryInfo->slug,
                    'catID' => $categoryInfo->id,
                    'artSlug' => $articleInfo->slug,
                    'artID' => $articleInfo->id,
                ]);
                break;
            case 'category':
                $categoryInfo = CategoryModel::find($data->categoryID);
                $href = route('frontendCategory', ['catSlug' => $categoryInfo->slug, 'catID' => $categoryInfo->id]);
                break;
        }
        echo __FILE__;
        echo '<pre>';
        var_dump($href);
        echo '</pre>';
        echo __LINE__;
        return $href;
    }
}