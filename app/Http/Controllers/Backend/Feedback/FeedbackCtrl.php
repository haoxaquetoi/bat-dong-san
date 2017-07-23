<?php
namespace App\Http\Controllers\Backend\Feedback;

use App\Http\Controllers\Controller;

class FeedbackCtrl extends Controller {

    function main() {
       
        return view('backend/feedback/main');
    }
    
    function all() {
       
        return view('backend/feedback/listFeedback');
    }
    

}
