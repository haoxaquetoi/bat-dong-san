<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryCtrl extends Controller {

    function index() {
        return view('Backend/category/main');
    }

}
