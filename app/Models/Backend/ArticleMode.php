<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ArticleMode extends Model
{
    protected $table = 'article';
    
    function articleBase()
    {
        return $this->hasOne('App\Models\Backend\ArticleBaseModel','article_id');
 
    }
}
