<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CrawlerConfigModel extends Model
{
    protected $table = 'crawler_config';
    
    
    
    function website_name()
    {
        return $this->hasOne('App\Models\Backend\CrawlerModel', 'crawler_id');
    }
}
