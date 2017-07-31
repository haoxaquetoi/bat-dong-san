<?php
namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;

class SettingCtrl extends Controller {

    function main() {
       
        return view('backend/setting/main');
    }
    
    function detailSetting($code) {
       
        return view('backend/setting/detail/' . $code);
    }
}
