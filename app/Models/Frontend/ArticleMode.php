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
    /**
     * Danh sách tin bài
     * @param type $type Kiểu tin bài. News: Tin đăng, Product: Tin bất động sản
     * @param type $freeText Lọc theo tiều đề
     * @param type $sticky 1 Tin nổi bật, 0 Ngược lại
     * @param type $censored 1 Tin đảm bảo, 0 Ngược lại
     * @param type $sold 1 Đã bán, 0 Còn
     * @param type $page Trang
     * @param type $pageSize Số bản ghi trên 1 trang
     * @return type
     */
    public function getAllArticle($type = '', $freeText = '', $sticky = '', $censored = '', $sold = '', $page = 1, $pageSize = 10) {
        $limit = ($page - 1) * $pageSize;
        $db = DB::table($this->table)
                ->where('status', '=', 'Publish')
                ->whereRaw('DATEDIFF(begin_date, now())<=0')
                ->whereRaw('DATEDIFF(end_date, now())>=0')
                ->where('deleted', '=', 0);

        if ($type !== '') {
            $db->where('type', '=', $type);
        }
        if ($freeText != '') {
            $db->where('title', 'like', "%{$freeText}%");
        }
        if ($sticky != '') {
            $db->where('is_sticky', '=', $sticky);
        }

        if ($censored !== '') {
            $db->where('is_censored', '=', $censored);
        }

        if ($sold !== '') {
            $db->where('is_sold', '=', $sold);
        }

        $allArticle = $db->select('id')
                ->orderBy('begin_date', 'ASC')
                ->offset($limit)
                ->limit($pageSize)
                ->get();
        foreach ($allArticle as $key => $value) {
            $allArticle[$key] = $this->getArticleInfo($value->id);
        }
        return $allArticle;
    }

    /**
     * Chi tiết tin bài
     * @param type $articleID Mã tin bài
     * @return type
     */
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
    /**
     * Kiểm tra tin bài có hoạt động không
     * @param type $id Mã tin bài
     * @param type $type  kiểu tin bài. News: Tin đăng, Product: Tin bất động sản
     * @return type
     */
    function checkIdArticlePublish($id, $type = '') {
        $db = DB::table($this->table)
                ->where('id', '=', $id)
                ->where('status', '=', 'Publish')
                ->whereRaw('DATEDIFF(begin_date, now())<=0')
                ->whereRaw('DATEDIFF(end_date, now())>=0')
                ->where('deleted', '=', 0);
        if ($type !== '') {
            $db->where('type', '=', $type);
        }
        $arr = $db->orderBy('begin_date', 'ASC')
                ->pluck('id');
        if(count ($arr) > 0){
            return true;
        }else {
            return false;
        }
    }

}
