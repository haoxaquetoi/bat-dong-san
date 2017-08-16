<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WidgetCtrl extends Controller
{
    function index(){
        return view('frontend.widget.main');
    }
    
    function typeWidget($type){
        $view = 'frontend.widget.' . $type . 'Widget';
        return view($view);
    }
}
