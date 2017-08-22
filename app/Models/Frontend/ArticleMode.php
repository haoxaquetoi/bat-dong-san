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
        if ($sticky != '' && !is_null($sticky)) {
            $db->where('is_sticky', '=', $sticky);
        }

        if ($censored !== '' && !is_null($censored)) {
            $db->where('is_censored', '=', $censored);
        }

        if ($sold !== '' && !is_null($sold)) {
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
    function getAllArticleInvolve($articleId, $type, $page = 1, $pageSize = 10, $censored = '') {

        $db = $this->join(DB::raw("(
                                (SELECT  
                                  DISTINCT article_id,
                                  1 AS stt 
                                FROM
                                  tag_article 
                                WHERE tag_id IN (SELECT tag_id AS arr_tag_id FROM tag_article WHERE article_id = {$articleId}) 
                                  AND article_id != {$articleId} 
                                GROUP BY article_id) 
                                UNION
                                (SELECT  
                                  DISTINCT article_id,
                                  2 AS stt 
                                FROM
                                  category_article 
                                WHERE category_id IN (SELECT category_id AS arr_category_id FROM category_article WHERE article_id  = {$articleId}) 
                                  AND article_id != {$articleId} 
                                GROUP BY article_id)
                              ) sl "), function($join) {
                    $join->on('article.id', '=', 'sl.article_id');
                })
                ->where('status', '=', 'Publish')
                ->whereRaw('DATEDIFF(begin_date, now())<=0')
                ->whereRaw('DATEDIFF(end_date, now())>=0');
        if ($type !== '') {
            $db->where('type', '=', "$type");
        }
        if ($censored !== '') {
            $db->where('is_censored', '=', "$censored");
        }
        // danh sách các tin liên quan có thẻ tag trùng với thẻ tag $articleId và cùng chuyên mục với $articleId
        $arrArticleInvolve = $db->where('deleted', '=', 0)
                ->orderBy('sl.stt', 'ASC')
                ->orderBy('article.begin_date', 'DESC')
                ->paginate($pageSize, ['id'], 'page', $page);
//        dd($arrArticleInvolveTag);
        foreach ($arrArticleInvolve as $key => $value) {
            $arrArticleInvolve[$key] = $this->getArticleInfo($value->id);
        }
        return $arrArticleInvolve;
    }

    /**
     * Tìm kiếm tin bất động sản
     * @param type $params
     * $params->cs: tin đảm bảo
     * $params->st: Tin nổi bật
     * $params->kw từ khóa 
     * $params->cg: Lọai nhà đất
     * $params->ct Huyện, Thành phố
     * $params->dt Quận, huyện
     * $params->vil Phường, xã
     * $params->st : đường
     * $params->ad địa chỉ
     * $params->pmi Giá thấp nhất
     * $params->mpa Giá cáo nhất
     * $params->fami Diện tích nhỏ nhất
     * $params->fama Diện tích lớn nhất
     * $params->dh  Hướng nhà
     * $params->rn  Số phòng
     * @param type $page trang
     * @param type $pageSize số bản ghi trên một trang
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

        if ($params->cs !== '' && !is_null($params->cs)) {
            $db->where('article.is_censored', '=', $params->cs);
        }
        if ($params->st !== '' && !is_null($params->st)) {
            $db->where('article.is_sticky', '=', $params->st);
        }
        if ($params->kw) {
            $db->where('article.title', 'like', "%{$params->kw}%");
        }
        if ($params->cg) {
            $db->where('category_article.category_id', '=', $params->cg);
        }
        if ($params->ct) {
            $db->where('article_base.city_id', '=', $params->ct);
        }
        if ($params->dt) {
            $db->where('article_base.district_id', '=', $params->dt);
        }
        if ($params->vil) {
            $db->where('article_base.village_id', '=', $params->vil);
        }
        if ($params->st) {
            $db->where('article_base.street_id', '=', $params->st);
        }
        if ($params->ad) {
            $db->where('article_base.address', 'like', "%{$params->ad}%");
        }
        if ($params->pmi) {
            $db->where('article_base.price', '>=', $params->pmi);
        }
        if ($params->pma) {
            $db->where('article_base.price', '<=', $params->pma);
        }
        if ($params->fami) {
            $db->where('article_other.floor_area', '>=', $params->fami);
        }
        if ($params->fama) {
            $db->where('article_other.floor_area', '<=', $params->fama);
        }
        if ($params->dh) {
            $db->where('article_other.house_direction', '=', $params->dh);
        }
        if ($params->rn) {
            $db->where('article_other.number_of_bedrooms', '=', $params->rn);
        }
        if ($params->sn) {
            $db->where('article_other.number_of_storeys', '=', $params->sn);
        }
        $allArticle = $db->orderBy('begin_date', 'DESC')
                ->paginate($pageSize, ['article.id'], 'page', $page);
        foreach ($allArticle as $key => $value) {
            $allArticle[$key] = $this->getArticleInfo($value->id);
        }
        return $allArticle;
    }

    /**
     * Tìm kiếm tin đăng
     * @param type $params
     * $params->kw từ khóa 
     * $params->cg: Lọai nhà đất
     * @param type $page trang
     * @param type $pageSize số bản ghi trên một trang
     * @return type
     */
    public function searchArticleNews($params, $page = 1, $pageSize = 10) {
        $db = DB::table($this->table)
                ->leftJoin('category_article', 'article.id', '=', 'category_article.article_id')
                ->where('article.type', '=', 'News')
                ->where('article.status', '=', 'Publish')
                ->whereRaw('DATEDIFF(article.begin_date, now())<=0')
                ->whereRaw('DATEDIFF(article.end_date, now())>=0')
                ->where('deleted', '=', 0);

        if ($params->kw) {
            $db->where('article.title', 'like', "%{$params->kw}%");
        }
        if ($params->cg) {
            $db->where('category_article.category_id', '=', $params->cg);
        }
        $allArticle = $db->orderBy('begin_date', 'DESC')
                ->paginate($pageSize, ['*'], 'page', $page);

        return $allArticle;
    }

}
