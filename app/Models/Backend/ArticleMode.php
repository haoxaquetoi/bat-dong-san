<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ArticleMode extends Model {

    protected $table = 'article';

    function articleBase() {
        return $this->hasOne('App\Models\Backend\ArticleBaseModel', 'article_id');
    }

    function articleContact() {
        return $this->hasOne('App\Models\Backend\ArticleContactModel', 'article_id');
    }

    function articleOther() {
        return $this->hasOne('App\Models\Backend\ArticleOtherModel', 'article_id');
    }

}
