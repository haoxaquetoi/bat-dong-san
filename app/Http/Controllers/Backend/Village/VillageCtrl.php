<?php

namespace App\Http\Controllers\Backend\Village;

use App\Http\Controllers\Controller;

class VillageCtrl extends Controller {

    function main() {
       
        return view('backend/village/main');
    }
    function all() {
       
        return view('backend/village/listVillage');
    }
    function single() {
       
        return view('backend/village/singleVillage');
    }

}
