<?php
namespace App\Http\Controllers\Backend\SettingFeedback;

use App\Http\Controllers\Controller;

class SettingFeedbackCtrl extends Controller {

    function main() {
       
        return view('backend/settingFeedback/main');
    }
    
    function all() {
       
        return view('backend/settingFeedback/listSettingFeedback');
    }
    

}
