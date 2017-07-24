<?php

namespace App\Http\Controllers\Backend\District;

use App\Http\Controllers\Controller;

class DistrictCtrl extends Controller {

    function main() {
       
        return view('backend/district/main');
    }
    function all() {
       
        return view('backend/district/listDistrict');
    }
    function single() {
       
        return view('backend/district/singleDistrict');
    }

}
