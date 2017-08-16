<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model {

    protected $table = 'category';

    function updateCategory(array $attributes = array(), array $options = array()) {
        parent::update($attributes, $options);
    }

    function insertCategory(array $parans = array()) {
        Validator::make($request->all(), $this->rules, $this->message)->validate();
        parent::insertAndSetId($query, $parans);
    }

    /**
     * 
     * @param type $parent_id
     * @param array $catTmp
     * @param string $child
     * @param type $type
     * @return type
     */
    function getAllCat($parent_id = 0, $type = NULL, array &$catTmp = array(), $child = '') {
        $data = CategoryModel::where('deleted', '!=', 1)->orderBy('depth')->orderBy('order')->get();
        foreach ($data as &$cat) {
            $arrdepth = explode('/', $cat->depth);
            $cat->children = '';
            for ($i = 2; $i < count($arrdepth); $i++) {
                $cat->children .= ' -- ';
            }
        }
        return $data;
    }

    function getCategoryInfo($catId) {
        return $this::find($catId);
    }

}
