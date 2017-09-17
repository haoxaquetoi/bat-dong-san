<?php

namespace App\Http\Controllers\Backend\District;

use App\Http\Controllers\Controller;

class DistrictCtrl extends Controller {

    function main() {
       
        return view('Backend/district/main');
    }
    function all() {
       
        return view('Backend/district/listDistrict');
    }
    function single() {
       
        return view('Backend/district/singleDistrict');
    }

}
