<?php

namespace App\Http\Controllers\Backend\Street;

use App\Http\Controllers\Controller;

class StreetCtrl extends Controller {

    function main() {
       
        return view('Backend/street/main');
    }
    function all() {
       
        return view('Backend/street/listStreet');
    }
    function single() {
       
        return view('Backend/street/singleStreet');
    }

}
