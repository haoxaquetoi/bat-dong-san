<?php

namespace App\Http\Controllers\Backend\Modal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModalCtrl extends Controller
{
    public function index($name){
        $view = 'Backend.modal.' . $name;
        return view($view);
    }
}
