<?php

namespace App\Models\Frontend;
use DB;
use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model {

    protected $table = 'feedback';

    function getAllFeedback() {
        $return = DB::table($this->table)
                ->select('id', 'name')
                ->where('status', '=', 1)
                ->orderBy('order', 'ASC')
                ->orderBy('name', 'ASC')
                ->get();
        return $return;
    }

}
