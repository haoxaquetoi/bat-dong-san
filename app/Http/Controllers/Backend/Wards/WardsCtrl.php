<?php

namespace App\Http\Controllers\Backend\Wards;

use App\Http\Controllers\Controller;

class WardsCtrl extends Controller {

    function main() {
       
        return view('backend/wards/main');
    }
    function all() {
       
        return view('backend/wards/listWards');
    }
    function single() {
       
        return view('backend/wards/singleWards');
    }

}
