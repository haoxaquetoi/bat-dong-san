<?php
namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;

class SettingCtrl extends Controller {

    function main() {
       
        return view('Backend.setting.main');
    }
    
    function detailSetting($code) {
       
        return view('Backend.setting.detail.' . $code);
    }
}
