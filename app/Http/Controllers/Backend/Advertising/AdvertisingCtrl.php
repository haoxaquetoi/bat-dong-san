<?php

namespace App\Http\Controllers\Backend\Advertising;

use App\Http\Controllers\Controller;

class AdvertisingCtrl extends Controller {

    function main() {
       
        return view('backend/advertising/main');
    }
    function all() {
       
        return view('backend/advertising/listAdvertising');
    }
    function single() {
       
        return view('backend/advertising/singleAdvertising');
    }

}
