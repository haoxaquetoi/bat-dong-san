<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Controller;

class CityCtrl extends Controller {

    function main() {
       
        return view('backend/city/main');
    }
    function all() {
       
        return view('backend/city/listCity');
    }
    function single() {
       
        return view('backend/city/singleCity');
    }

}
