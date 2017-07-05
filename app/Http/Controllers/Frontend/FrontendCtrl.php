<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendCtrl extends Controller {

    function homePage() {
        return view('Frontend.homePage');
    }

    function singlePage() {
        return view('Frontend.singlePage');
    }

    function singleCategory() {
        return view('Frontend.singleCategory');
    }

}
