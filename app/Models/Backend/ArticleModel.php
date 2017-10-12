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

        $articleInfo->article_slide = new \stdClass();

        $articleInfo->article_slide->images = DB::table('article_slide')->where([
                    ['article_id', '=', $articleInfo->id],
                    ['type', '=', 'images']
                ])->get()->toArray();

        $articleInfo->article_slide->video = DB::table('article_slide')->where([
                    ['article_id', '=', $articleInfo->id],
                    ['type', '!=', 'images']
                ])->get()->toArray();

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

    function getAll($category_id = '', $type = '', $option = '', $freeText = '', $post_date = '', $ord_crat = '', $ord_sk = '', $ord_cd = '', $ord_fb = '', $chkCrawler = NULL, $total_phone = '') {
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
        if (intval($total_phone)) {
            $artModel = $artModel->leftJoin('article_contact', 'article.id', '=', 'article_contact.article_id');
            if (intval($total_phone) <= 1) {
                $sqlRaw = "article_contact.mobile is null Or article_contact.mobile in (SELECT mobile  FROM `article_contact` GROUP BY mobile HAVING  COUNT(mobile) <= " . intval($total_phone) . ")";
            } else {
                $sqlRaw = "article_contact.mobile in (SELECT mobile  FROM `article_contact` GROUP BY mobile HAVING  COUNT(mobile) >= " . intval($total_phone) . ")";
            }

            $artModel->whereRaw($sqlRaw);
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
        if ($ord_fb) {
            $artModel = $artModel->orderBy('feedBackReaded', $ord_fb);
        }
        if ($chkCrawler !== NULL) {
            if ($chkCrawler) {
                $artModel->whereNotNull('parent_url');
            } else {
                $artModel->where(function($query) {
                    $query->where(function($querySub) {
                        $querySub->whereNull('parent_url');
                    });
                    $query->orWhere(function($querySub) {
                        $querySub->where('crawlerPublish', 1);
                    });
                });
            }
        }
        //đếm số feedback
        $artModel->select(DB::Raw('(select count(id) from feedback_article where article.id = feedback_article.article_id and readed!= 1 ) as feedBackReaded,(select count(id) from feedback_article where article.id = feedback_article.article_id) as totalFeedBack ,article.*'));

        return $artModel->paginate()->toArray();
    }

}
