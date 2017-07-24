<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestCtrl extends Controller
{
    function index($view){
        $view = 'test.' . $view;
        return view($view);
    }
}
