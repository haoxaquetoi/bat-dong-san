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

        if ($parent_id != 0) {
            $child .= ' --- ';
        }
        $whereParent = [];
        if($type !== NULL)
        {
            $whereParent[] = ['type','=',"$type"];
        }
        $whereParent[] = ['parent_id', '=', "$parent_id"];
        
        $cat = $this->where($whereParent)->orderBy('order', 'asc')->get();
        for ($i = 0; $i < count($cat); $i++) {
            $cat[$i]['children'] = $child;
            $cat[$i]['name'] = $cat[$i]['name'];
            $catTmp[] = $cat[$i];
            $parent_id = $cat[$i]['id'];
            $whereChild = [];
            if ($type !== NULL) {
               
                $whereChild[] = ['type','=',"$type"];
            }
            $whereChild[] = ['parent_id', '=', "$parent_id"];
            $catChild = $this->where($whereChild)->count();

            if ($catChild) {
                $this->getAllCat($parent_id, $type, $catTmp, $child);
            }
        }
        return $catTmp;
    }

    function getCategoryInfo($catId) {
        return $this::find($catId);
    }

}
