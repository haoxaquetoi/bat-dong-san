<?php

namespace App\Http\Controllers\Backend\Menu;

use App\Http\Controllers\Controller;

class MenuCtrl extends Controller {

    function main() {
       
        return view('backend/menu/main');
    }
    function all() {
       
        return view('backend/menu/listMenu');
    }
    function single() {
       
        return view('backend/menu/singleMenu');
    }

}
