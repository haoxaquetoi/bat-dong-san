<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Controller;

class CityCtrl extends Controller {

    function main() {
       
        return view('Backend/city/main');
    }
    function all() {
       
        return view('Backend/city/listCity');
    }
    function single() {
       
        return view('Backend/city/singleCity');
    }

}
