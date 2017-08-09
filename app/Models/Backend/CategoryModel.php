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

    function getAllCat($parent_id = 0, array &$catTmp = array(), $child = '') {

        if ($parent_id != 0) {
            $child .= ' --- ';
        }
        $cat = $this->where('parent_id', '=', "$parent_id")->orderBy('order', 'asc')->get();
        for ($i = 0; $i < count($cat); $i++) {
            $cat[$i]['children'] = $child;
            $cat[$i]['name'] = $cat[$i]['name'];
            $catTmp[] = $cat[$i];
            $parent_id = $cat[$i]['id'];
            $catChild = $this->where('parent_id', '=', "$parent_id")->count();
            if ($catChild) {
                $this->getAllCat($parent_id, $catTmp, $child);
            }
        }
        return $catTmp;
    }

    function getCategoryInfo($catId) {
        return $this::find($catId);
    }

}
