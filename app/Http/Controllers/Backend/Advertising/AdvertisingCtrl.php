<?php

namespace App\Http\Controllers\Backend\Advertising;

use App\Http\Controllers\Controller;

class AdvertisingCtrl extends Controller {

    function main() {
       
        return view('Backend/advertising/main');
    }
    function all() {
       
        return view('Backend/advertising/listAdvertising');
    }
    function single() {
       
        return view('Backend/advertising/singleAdvertising');
    }

}
