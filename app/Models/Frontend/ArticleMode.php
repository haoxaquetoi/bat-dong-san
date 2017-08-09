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
        $offset = ($page - 1) * $pageSize;
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
                ->offset($offset)
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
                ])->where('id', '=', $articleID)->first();
        if (isset($articleInfo->articleBase->city_id))
            $articleInfo->articleBase->city_name = DB::table('address_city')->find($articleInfo->articleBase->city_id)->name;
        if (isset($articleInfo->articleBase->district_id))
            $articleInfo->articleBase->district_name = DB::table('address_district')->find($articleInfo->articleBase->district_id)->name;
        if (isset($articleInfo->articleBase->village_id))
            $articleInfo->articleBase->village_name = DB::table('address_village')->find($articleInfo->articleBase->village_id)->name;
        if (isset($articleInfo->articleBase->street_id))
            $articleInfo->articleBase->street_name = DB::table('address_street')->find($articleInfo->articleBase->street_id)->name;

        $articleInfo->articleSlide = new \stdClass();

        $articleInfo->articleSlide->images = DB::table('article_slide')->where([
                    ['article_id', '=', $articleInfo->id],
                    ['type', '=', 'images']
                ])->get()->toArray();

        $articleInfo->articleSlide->video = DB::table('article_slide')->where([
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
        return $articleInfo;
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
        if (count($arr) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getAllArticleInvolve($articleId, $type, $page = 1, $pageSize = 10) {
        // tin liên quan
        $arrArticleInvolve = array();
        // mảng id tin bag liên quan thr tag
        $arrIdArticleTag = array();
        $offset = ($page - 1) * $pageSize;
        $limit = $pageSize;
        //tổng số bản ghi liên quan tag
        $totalArticleTag = 0;
        // danh sách thẻ tag của tin bài
        $arrTagArticle = DB::table('tag_article')
                ->where('article_id', '=', $articleId)
                ->selectRaw('group_concat(tag_id) as arr_tag_id')
                ->first();
        if ($arrTagArticle->arr_tag_id) {
            // danh sách các tin liên quan có thẻ tag trùng với thẻ tag vừa $articleId
            $db = DB::table($this->table)
                    ->join(DB::raw("(SELECT 
                                    GROUP_CONCAT(DISTINCT article_id) as article_id
                                  FROM
                                    tag_article 
                                  WHERE tag_id IN 
                                    ($arrTagArticle->arr_tag_id) 
                                    AND article_id != $articleId
                                    GROUP BY article_id
                                  ORDER BY id DESC) ta"), function($join) {
                        $join->on('article.id', '=', 'ta.article_id');
                    })
                    ->where('status', '=', 'Publish')
                    ->whereRaw('DATEDIFF(begin_date, now())<=0')
                    ->whereRaw('DATEDIFF(end_date, now())>=0');
            if ($type !== '') {
                $db->where('type', '=', $type);
            }
            // danh sách các tin liên quan có thẻ tag trùng với thẻ tag vừa $articleId
            $arrArticleInvolveTag = $db->where('deleted', '=', 0)
                    ->orderBy('begin_date', 'ASC')
                    ->paginate($limit, ['id'], 'page', $page);

            $limit -= $arrArticleInvolveTag->count();
            //tổng số bản ghi liên quan tag
            $totalArticleTag = $arrArticleInvolveTag->total();

            foreach ($arrArticleInvolveTag as $value) {
                $arrArticleInvolve[] = $this->getArticleInfo($value->id);
                $arrIdArticleTag[] = $value->id;
            }
        }
        if ($limit > 0) {
            $stringIdArticleTag = (count($arrIdArticleTag)) ? implode(",", $arrIdArticleTag) : '0';
            // danh sách chuyên mục của tin bài
            $arrCategory = DB::table('category_article')
                    ->where('article_id', '=', $articleId)
                    ->selectRaw('group_concat(category_id) as arr_category_id')
                    ->first();

            // danh sách các tin liên quan cùng category
            if ($arrCategory->arr_category_id) {
                $db = DB::table($this->table)
                        ->join(DB::raw("(SELECT 
                                    GROUP_CONCAT(DISTINCT article_id) as article_id
                                  FROM
                                    category_article 
                                  WHERE category_id IN 
                                    ($arrCategory->arr_category_id) 
                                    AND article_id != $articleId
                                        AND article_id NOT IN ($stringIdArticleTag)
                                    GROUP BY article_id
                                  ORDER BY id DESC) ca"), function($join) {
                            $join->on('article.id', '=', 'ca.article_id');
                        })
                        ->where('status', '=', 'Publish')
                        ->whereRaw('DATEDIFF(begin_date, now())<=0')
                        ->whereRaw('DATEDIFF(end_date, now())>=0');
                if ($type !== '') {
                    $db->where('type', '=', $type);
                }

                $offset = $offset - $totalArticleTag;
                $arrArticleInvolveCategory = $db->where('deleted', '=', 0)
                        ->orderBy('begin_date', 'ASC')
                        ->offset($offset)
                        ->limit($limit)
                        ->get();
                foreach ($arrArticleInvolveCategory as $value) {
                    $arrArticleInvolve[] = $this->getArticleInfo($value->id);
                    $arrIdArticleTag[] = $value->id;
                }
            }
        }
        return $arrArticleInvolve;
    }

}
