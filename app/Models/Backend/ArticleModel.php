<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DB;

class ArticleModel extends Model {

    protected $table = 'article';

    function article_base() {
        return $this->hasOne('App\Models\Backend\ArticleBaseModel', 'article_id');
    }

    function article_contact() {
        return $this->hasOne('App\Models\Backend\ArticleContactModel', 'article_id');
    }

    function article_other() {
        return $this->hasOne('App\Models\Backend\ArticleOtherModel', 'article_id');
    }

    function getArticleInfo($articleID) {

        $articleInfo = $this->with([
                    'article_base', 'article_contact', 'article_other'
                ])->where('id', '=', $articleID)->first();
        if (!$articleInfo)
            return [];

        if (isset($articleInfo->article_base->city_id))
            $articleInfo->article_base->city_name = DB::table('address_city')->find($articleInfo->article_base->city_id)->name;
        if (isset($articleInfo->article_base->district_id))
            $articleInfo->article_base->district_name = DB::table('address_district')->find($articleInfo->article_base->district_id)->name;
        if (isset($articleInfo->article_base->village_id))
            $articleInfo->article_base->village_name = DB::table('address_village')->find($articleInfo->article_base->village_id)->name;
        if (isset($articleInfo->article_base->street_id))
            $articleInfo->article_base->street_name = DB::table('address_street')->find($articleInfo->article_base->street_id)->name;

        $categoryTmp = array();
        $category = DB::table('category_article')->where('article_id', '=', $articleID)->select('category_id')->get();
        $category = collect($category)->toArray();
        foreach ($category as $key => $value) {
            $categoryTmp[] = (int) $value->category_id;
        }
        $articleInfo->category = $categoryTmp;

        $tags = DB::table('tag_article')->where('article_id', '=', $articleID)->select('tag_id')->get();
        $tags = collect($tags)->toArray();
        $tagsTmp = [];
        foreach ($tags as $key => $value) {
            $tagInfo = DB::table('tag')->find($value->tag_id);
            if (isset($tagInfo->code)) {
                $tagsTmp[] = $tagInfo->code;
            }
        }
        $articleInfo->tags = $tagsTmp;


        if ($articleInfo->begin_date != '')
            $articleInfo->begin_date = explode(' ', $articleInfo->begin_date)[0];

        if ($articleInfo->end_date != '')
            $articleInfo->end_date = explode(' ', $articleInfo->end_date)[0];

        return $articleInfo->toArray();
    }

    function get_all_post_date() {
        return $this->select(DB::raw("DATE_FORMAT(created_at,'%m-%Y') as post_date"))->groupBy('post_date')->orderBy('post_date', 'desc')->get()->toArray();
    }

    function getAll($category_id = '', $type = '', $option = '', $freeText = '', $post_date = '', $ord_crat = '', $ord_sk = '', $ord_cd = '') {
        $arr_where = [];
        if ($type) {
            $arr_where[] = ['type', '=', $type];
        }


        if ($option == 'Trash' || $option == 'Publish') {
            $arr_where[] = ['status', '=', $option];
        }
        if ($option == 'deleted') {
            $arr_where[] = ['deleted', '=', 1];
        }
        if ($freeText) {
            $arr_where[] = ['title', 'like', "%{$freeText}%"];
        }
        if ($post_date) {
            $arr_where[] = [DB::raw("DATE_FORMAT(created_at,'%m-%Y')"), '=', $post_date];
        }
        $artModel = $this;
        if (intval($category_id) > 0) {
            $artModel = $artModel->leftJoin('category_article', 'article.id', '=', 'category_article.article_id');
            $arr_where[] = ['category_article.category_id', '=', intval($category_id)];
        }
        $artModel = $artModel->where($arr_where);
        if ($ord_crat) {

            $artModel = $artModel->orderBy('created_at', $ord_crat);
        }
        if ($ord_sk) {
            $artModel = $artModel->orderBy('is_sticky', $ord_sk);
        }
        if ($ord_cd) {
            $artModel = $artModel->orderBy('is_censored', $ord_cd);
        }

        return $artModel->where($arr_where)->paginate()->toArray();
    }

}
