<?php
namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;

class SettingCtrl extends Controller {

    function main() {
       
        return view('backend/setting/main');
    }
    
    function settingInfo() {
       
        return view('backend/setting/settingInfo');
    }
    
    function settingEmail() {
       
        return view('backend/setting/settingEmail');
    }

}
