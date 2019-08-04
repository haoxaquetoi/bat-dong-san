<?php

namespace App\Http\Controllers\Backend\Menu;

use App\Http\Controllers\Controller;

class MenuCtrl extends Controller {

    function main() {
        
        return view('Backend/menu/main');
    }

    function all() {

        return view('Backend/menu/listMenu');
    }

    function single() {

        return view('Backend/menu/singleMenu');
    }

}
