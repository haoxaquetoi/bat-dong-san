<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;


class CrawlerModel extends Model {

    protected $table = 'crawler';

    function getAllCrawler($deleted = null, $load_category_config = FALSE) {

        if ($deleted === 0) {
            $this->where('parent_id', '=', 0);
        } elseif ($deleted === 1) {
            $this->where('deleted', '=', 1);
        }
        return $this->get();
    }

}
