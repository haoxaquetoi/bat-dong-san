<?php

namespace App\Http\Controllers\Backend\Advertising;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisingCtrl extends Controller {

    function main() {
       
        return view('backend/advertising/main');
    }

}
