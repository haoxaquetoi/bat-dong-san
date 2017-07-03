<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CrawlerModel extends Model
{

    protected $table = 'crawler';

    function getAllCrawler()
    {
        return $this->get();
    }

}
