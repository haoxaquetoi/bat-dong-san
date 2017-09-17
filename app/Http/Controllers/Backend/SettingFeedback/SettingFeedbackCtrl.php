<?php
namespace App\Http\Controllers\Backend\SettingFeedback;

use App\Http\Controllers\Controller;

class SettingFeedbackCtrl extends Controller {

    function main() {
       
        return view('Backend/settingFeedback/main');
    }
    
    function all() {
       
        return view('Backend/settingFeedback/listSettingFeedback');
    }
    

}
