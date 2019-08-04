<?php

namespace App\Http\Controllers\Backend\Village;

use App\Http\Controllers\Controller;

class VillageCtrl extends Controller {

    function main() {
       
        return view('Backend/village/main');
    }
    function all() {
       
        return view('Backend/village/listVillage');
    }
    function single() {
       
        return view('Backend/village/singleVillage');
    }

}
