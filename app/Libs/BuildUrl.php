<?php

namespace App\Libs;

class BuildUrl {

    function __construct() {
        ;
    }

    /**
     * Render url detail article
     * @param string $catSlug Đường dẫn slug chuyên mục
     * @param int $catID ID chuyên mục
     * @param int $artID Mã tin bài
     * @param string $artSlug Đường dẫn slug tin bài


     * @return $catSlug/$artID/$artSlug/$catID
     */
    function buildArticleDetail($catSlug, $catID, $artSlug, $artID) {
        return url("$catSlug/$catID/$artSlug/$artID");
    }

    /**
     *  Render url detail category
     * @param int $catID Mã chuyên mục
     * @param string $catSlug Đường dẫn slug chuyên mục
     * @return $catSlug/$catID
     */
    function buildCategoryDetail($catID, $catSlug) {
        return url("$catSlug/$catID");
    }

    /**
     * Render url detail tags
     * @param type $tagName
     * @return tags/$tagName
     */
    function buildTagsDetail($tagName) {
        return url("tags/$tagName");
    }

    /**
     * Render url page search
     * @param array $params
     * @return type
     */
    function buildSearchDetail(array $params = array()) {
        return url("tim-kiem") . (count($params) > 0 ? '?' . http_build_query($params) : '');
    }

    /**
     * Render url page contact
     * @param array $params
     * @return type
     */
    function buildContactDetail() {
        return url("thong-tin-lien-he");
    }

}
