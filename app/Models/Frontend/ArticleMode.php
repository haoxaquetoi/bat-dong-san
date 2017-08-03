<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use DB;

class ArticleMode extends Model {

    protected $table = 'article';

    function articleBase() {
        return $this->hasOne('App\Models\Frontend\ArticleBaseModel', 'article_id');
    }

    function articleContact() {
        return $this->hasOne('App\Models\Frontend\ArticleContactModel', 'article_id');
    }

    function articleOther() {
        return $this->hasOne('App\Models\Frontend\ArticleOtherModel', 'article_id');
    }

    public function getAllArticle($request) {

        $db = DB::table($this->table);

        if ($request->type != '') {
            $db->where('type', '=', $request->type);
        }
        if ($request->status != '') {
            $db->where('status', '=', $request->status);
        }
        if ($request->deleted != '') {
            $db->where('deleted', '=', $request->deleted);
        }
        if ($request->created_at != '') {
            $db->where('created_at', '=', $request->created_at);
        }
        if ($request->freeText != '') {
            $db->where('title', 'like', "%{$request->freeText}%");
        }

        $allArticle = $db->select('id')->get();
        foreach ($allArticle as $key => $value) {
            $allArticle[$key] = $this->getArticleInfo($value->id);
        }
        return $allArticle;
    }

    function getArticleInfo($articleID) {
        $articleInfo = $this::with([
                    'articleBase', 'articleContact', 'articleOther'
                ])->where('id', '=', $articleID)->get();
        if (isset($articleInfo[0]->articleBase->city_id))
            $articleInfo[0]->articleBase->city_name = DB::table('address_city')->find($articleInfo[0]->articleBase->city_id)->name;
        if (isset($articleInfo[0]->articleBase->district_id))
            $articleInfo[0]->articleBase->district_name = DB::table('address_district')->find($articleInfo[0]->articleBase->district_id)->name;
        if (isset($articleInfo[0]->articleBase->village_id))
            $articleInfo[0]->articleBase->village_name = DB::table('address_village')->find($articleInfo[0]->articleBase->village_id)->name;
        if (isset($articleInfo[0]->articleBase->street_id))
            $articleInfo[0]->articleBase->street_name = DB::table('address_street')->find($articleInfo[0]->articleBase->street_id)->name;
        
        $categoryTmp = array();
        $category = DB::table('category_article')->where('article_id', '=', $articleID)->select('category_id')->get();
        $category = collect($category)->toArray();
        foreach ($category as $key => $value) {
            $categoryTmp[] = (int) $value->category_id;
        }
        $articleInfo[0]->category = $categoryTmp;

        $tags = DB::table('tag_article')->where('article_id', '=', $articleID)->select('tag_id')->get();
        $tags = collect($tags)->toArray();
        $tagsTmp = [];
        foreach ($tags as $key => $value) {
            $tagInfo = DB::table('tag')->find($value->tag_id);
            if (isset($tagInfo->code)) {
                $tagsTmp[] = $tagInfo->code;
            }
        }
        $articleInfo[0]->tags = $tagsTmp;

        if ($articleInfo[0]->begin_date != '')
            $articleInfo[0]->begin_date = explode(' ', $articleInfo[0]->begin_date)[0];

        if ($articleInfo[0]->end_date != '')
            $articleInfo[0]->end_date = explode(' ', $articleInfo[0]->end_date)[0];
        return $articleInfo[0];
    }

}
