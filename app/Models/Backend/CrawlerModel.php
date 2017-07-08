<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DB;

class CrawlerModel extends Model {

    protected $table = 'crawler';

    function getAllCrawler($deleted = null, $load_category_config = FALSE, array $filter = array()) {

        $db = DB::table($this->table);
        if ($deleted === 0) {
            $db->where('parent_id', '=', 0);
        } elseif ($deleted === 1) {
            $db->where('deleted', '=', 1);
        }
        
        $keywork = isset($filter['keywork']) ? $filter['keywork'] : null;

        if ($keywork != '' && $keywork != null) {
            $db->where(function($query) use ($keywork) {
                $query->where('website_url', 'like', "%{$keywork}%")->orWhere('website_url', 'like', "%{$keywork}%");
            });
        }
        return $db->get();
    }

}
