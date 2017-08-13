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
     * @param type $idCategory Lọc theo chuyên mục
     * @param type $freeText Lọc theo tiều đề
     * @param type $sticky 1 Tin nổi bật, 0 Ngược lại
     * @param type $censored 1 Tin đảm bảo, 0 Ngược lại
     * @param type $sold 1 Đã bán, 0 Còn
     * @param type $page Trang
     * @param type $pageSize Số bản ghi trên 1 trang
     * @return type
     */
    public function getAllArticle($type = '', $idCategory = '', $freeText = '', $sticky = '', $censored = '', $sold = '', $page = 1, $pageSize = 10) {
        $db = DB::table($this->table)
                ->where('status', '=', 'Publish')
                ->whereRaw('DATEDIFF(begin_date, now())<=0')
                ->whereRaw('DATEDIFF(end_date, now())>=0')
                ->where('deleted', '=', 0);

        if ($type !== '') {
            $db->where('type', '=', $type);
        }

        if ($idCategory !== '') {

             $idCategory = (int) $idCategory;
            $db->whereRaw("id IN(SELECT article_id FROM category_article WHERE category_id = '$idCategory')");
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
        if ($type == 'News') {
            $allArticle = $db->orderBy('begin_date', 'DESC')
                    ->paginate($pageSize, ['*'], 'page', $page);
            foreach ($allArticle as $key => $value) {
                $allArticle[$key]->category = DB::table('category')
                                ->leftJoin('category_article', 'category_article.category_id', '=', 'category.id')
                                ->where('category_article.article_id', '=', $value->id)
                                ->where('category.status', '=', 1)
                                ->where('category.deleted', '=', 0)
                                ->orderby('category.order')
                                ->get()->toArray();
            }
            return $allArticle;
        }

        $allArticle = $db->orderBy('begin_date', 'DESC')
                ->paginate($pageSize, ['id'], 'page', $page);
        foreach ($allArticle as $key => $value) {
            $allArticle[$key] = $this->getArticleInfo($value->id);
        }
        return $allArticle;
    }

    /**
     * Xét điều kiện xóa tin bài
     * @param NULL||boolean $chkDeleted TRUE -  Đã xóa <br/>FALSE - Chưa xóa <br/>Mặc định không xét
     * @return $this
     */
    function checkDeleted($chkDeleted = NULL) {
        if ($chkDeleted === TRUE) {
            $this->where('deleted', '=', 0);
        } elseif ($chkDeleted === FALSE) {
            $this->where('deleted', '=', 1);
        }
        return $this;
    }

    /**
     * Xét loại tin dăng
     * @param NULL||boolean $chkType <br/>News: Tin tức <br/>Product:Tin bất động sản <br/>Mặc định không xét
     * @return $this
     */
    function checkType($chkType = NULL) {
        if ($chkType === 'News') {
            $this->where('status', '=', 'Publish');
        } elseif ($chkType === 'Product') {
            $this->where('status', '=', 'Publish');
        }
        return $this;
    }

    /**
     * Xét còn hoạt động hay khong còn hoạt động
     * @param NULL||boolean $chkdealine TRUE: Còn hạn <br/>FALSE: Hết hạn đăng không hiên thị <br/>Mặc định không xét
     * @return $this
     */
    function checkDealine($chkdealine = NULL) {
        if ($chkdealine === TRUE) {
            $this->whereRaw('DATEDIFF(begin_date, now())<=0')
                    ->whereRaw('DATEDIFF(end_date, now())>=0');
        } elseif ($chkdealine === FALSE) {
            $this->whereRaw('DATEDIFF(begin_date, now())>0')
                    ->whereRaw('DATEDIFF(end_date, now())<0');
        }


        return $this;
    }

    /**
     * Chi tiết tin bài
     * @param int $articleID Mã tin bài
     * @param any $checkDealine <br/>TRUE: Còn hạn <br/>FALSE: Hết hạn đăng không hiên thị <br/>Mặc định không xét
     * @param string $chkType <br/>News: Tin tức <br/>Product:Tin bất động sản <br/>Mặc định không xét
     * @param NULL||boolean $chkDeleted TRUE -  Đã xóa <br/>FALSE - Chưa xóa <br/>Mặc định không xét
     * @return 
     */
    function getArticleInfo($articleID, $checkDealine = NULL, $chkType = NULL, $chkDeleted = NULL) {

        $this::with([
            'articleBase', 'articleContact', 'articleOther'
        ]);
        $this->checkDealine($checkDealine);
        $this->checkType($chkType);
        $this->checkDeleted($chkDeleted);
        $postInfo = $this->where('id', '=', $articleID)->first();

        if (!isset($postInfo->id)) {
            return [];
        }
        if (isset($postInfo->articleBase->city_id))
            $postInfo->articleBase->city_name = DB::table('address_city')->find($postInfo->articleBase->city_id)->name;
        if (isset($postInfo->articleBase->district_id))
            $postInfo->articleBase->district_name = DB::table('address_district')->find($postInfo->articleBase->district_id)->name;
        if (isset($postInfo->articleBase->village_id))
            $postInfo->articleBase->village_name = DB::table('address_village')->find($postInfo->articleBase->village_id)->name;
        if (isset($postInfo->articleBase->street_id))
            $postInfo->articleBase->street_name = DB::table('address_street')->find($postInfo->articleBase->street_id)->name;

        $postInfo->articleSlide = new \stdClass();

        $postInfo->articleSlide->images = DB::table('article_slide')->where([
                    ['article_id', '=', $postInfo->id],
                    ['type', '=', 'images']
                ])->get()->toArray();

        $postInfo->articleSlide->video = DB::table('article_slide')->where([
                    ['article_id', '=', $postInfo->id],
                    ['type', '!=', 'images']
                ])->get()->toArray();

        $categoryTmp = array();
        $category = DB::table('category_article')->where('article_id', '=', $articleID)->select('category_id')->get();
        $category = collect($category)->toArray();
        foreach ($category as $key => $value) {
            $categoryTmp[] = (int) $value->category_id;
        }
        $postInfo->category = $categoryTmp;

        $tags = DB::table('tag_article')->where('article_id', '=', $articleID)->select('tag_id')->get();
        $tags = collect($tags)->toArray();
        $tagsTmp = [];
        foreach ($tags as $key => $value) {
            $tagInfo = DB::table('tag')->find($value->tag_id);
            if (isset($tagInfo->code)) {
                $tagsTmp[] = $tagInfo->code;
            }
        }
        $postInfo->tags = $tagsTmp;

        if ($postInfo->begin_date != '')
            $postInfo->begin_date = explode(' ', $postInfo->begin_date)[0];


        if ($postInfo->end_date != '')
            $postInfo->end_date = explode(' ', $postInfo->end_date)[0];

        $postInfo->category = DB::table('category')
                        ->leftJoin('category_article', 'category_article.category_id', '=', 'category.id')
                        ->where('category_article.article_id', '=', $postInfo->id)
                        ->where('category.status', '=', 1)
                        ->where('category.deleted', '=', 0)
                        ->orderby('category.order')
                        ->get()->toArray();

        return $postInfo;
    }

    /**
     * Danh sách tin liên quan
     * @param type $articleId : id tin bài
     * @param type $type kiểu tin bài
     * @param type $page trang
     * @param type $pageSize số bản ghi trên 1 trang
     * @return type
     */
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

            $db = $this->join(DB::raw("(SELECT 
                                    GROUP_CONCAT(DISTINCT article_id) as article_id
                                  FROM
                                    tag_article 
                                  WHERE tag_id IN 
                                    ($arrTagArticle->arr_tag_id) 
                                    AND article_id != $articleId
                                    GROUP BY article_id ) ta"), function($join) {
                        $join->on('article.id', '=', 'ta.article_id');
                    })
                    ->where('status', '=', '"Publish"')
                    ->whereRaw('DATEDIFF(begin_date, now())<=0')
                    ->whereRaw('DATEDIFF(end_date, now())>=0');
            if ($type !== '') {
                $db->where('type', '=', "'$type'");
            }

            // danh sách các tin liên quan có thẻ tag trùng với thẻ tag vừa $articleId
            $arrArticleInvolveTag = $db->where('deleted', '=', 0)
                    ->orderBy('begin_date', 'DESC')
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
                        ->orderBy('begin_date', 'DESC')
                        ->offset($offset)
                        ->limit($limit)
                        ->get();
                foreach ($arrArticleInvolveCategory as $value) {
                    $arrArticleInvolve[] = $this->getArticleInfo($value->id, TRUE, $value->type, FALSE);
                    $arrIdArticleTag[] = $value->id;
                }
            }
        }
        return $arrArticleInvolve;
    }

    /**
     * Tiemf kiếm tin bất động sản
     * @param type $params
     * @param type $page
     * @param type $pageSize
     * @return type
     */
    public function searchArticleProduct($params, $page = 1, $pageSize = 10) {
        $db = DB::table($this->table)
                ->leftJoin('article_base', 'article.id', '=', 'article_base.article_id')
                ->leftJoin('article_contact', 'article.id', '=', 'article_contact.article_id')
                ->leftJoin('article_other', 'article.id', '=', 'article_other.article_id')
                ->leftJoin('category_article', 'article.id', '=', 'category_article.article_id')
                ->where('article.type', '=', 'Product')
                ->where('article.status', '=', 'Publish')
                ->whereRaw('DATEDIFF(article.begin_date, now())<=0')
                ->whereRaw('DATEDIFF(article.end_date, now())>=0')
                ->where('deleted', '=', 0);

        if ($params->censored) {
            $db->where('article.is_censored', '=', $params->censored);
        }
        if ($params->sticky) {
            $db->where('article.is_sticky', '=', $params->sticky);
        }
        if ($params->txtKeyWord) {
            $db->where('article.title', 'like', "%{$params->txtKeyWord}%");
        }
        if ($params->selCategory) {
            $db->where('category_article.category_id', '=', $params->selCategory);
        }
        if ($params->selCity) {
            $db->where('article_base.city_id', '=', $params->selCity);
        }
        if ($params->selDistrict) {
            $db->where('article_base.district_id', '=', $params->selDistrict);
        }
        if ($params->selVillage) {
            $db->where('article_base.village_id', '=', $params->selVillage);
        }
        if ($params->selStreet) {
            $db->where('article_base.street_id', '=', $params->selStreet);
        }
        if ($params->txtAddress) {
            $db->where('article_base.address', 'like', "%{$params->txtAddress}%");
        }
        if ($params->selPriceMin) {
            $db->where('article_base.price', '>=', $params->selPriceMin);
        }
        if ($params->selPriceMax) {
            $db->where('article_base.price', '<=', $params->selPriceMax);
        }
        if ($params->selFloorAreaMin) {
            $db->where('article_other.floor_area', '>=', $params->selFloorAreaMin);
        }
        if ($params->selFloorAreaMax) {
            $db->where('article_other.floor_area', '<=', $params->selFloorAreaMax);
        }
        if ($params->selDirectHour) {
            $db->where('article_other.house_direction', '=', $params->selDirectHour);
        }
        if ($params->selRoomNumber) {
            $db->where('article_other.number_of_bedrooms', '=', $params->selRoomNumber);
        }
        $allArticle = $db->orderBy('begin_date', 'DESC')
                ->paginate($pageSize, ['article.id'], 'page', $page);
        foreach ($allArticle as $key => $value) {
            $allArticle[$key] = $this->getArticleInfo($value->id);
        }
        return $allArticle;
    }

}
