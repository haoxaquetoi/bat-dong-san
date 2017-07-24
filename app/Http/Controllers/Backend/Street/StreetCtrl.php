<?php

namespace App\Http\Controllers\Backend\Street;

use App\Http\Controllers\Controller;

class StreetCtrl extends Controller {

    function main() {
       
        return view('backend/street/main');
    }
    function all() {
       
        return view('backend/street/listStreet');
    }
    function single() {
       
        return view('backend/street/singleStreet');
    }

}
