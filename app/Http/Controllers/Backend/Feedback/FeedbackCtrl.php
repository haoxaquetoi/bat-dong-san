<?php

namespace App\Http\Controllers\Backend\Feedback;

use App\Http\Controllers\Controller;
use DB;

class FeedbackCtrl extends Controller {

    function main() {
        $viewData = ['count' => []];

        $viewData['count']['totalReaded'] = DB::table('feedback_article')
                        ->where('readed', '=', 1)
                        ->select(DB::Raw('count(id) as total'))
                        ->first()->total;
        $viewData['count']['totalUnReaded'] = DB::table('feedback_article')
                        ->where('readed', '=', 0)
                        ->select(DB::Raw('count(id) as total'))
                        ->first()->total;
        $viewData['count']['total'] = DB::table('feedback_article')
                        ->select(DB::Raw('count(id) as total'))
                        ->first()->total;
   
        return view('Backend/feedback/main', $viewData);
    }

    function all() {

        return view('Backend/feedback/listFeedback');
    }

}
