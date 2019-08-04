<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupCtrl extends Controller {

    public function index() {
        return view('Backend.user.mainGroup');
    }

    public function all() {
        return view('Backend.user.group');
    }
    
    public function single() {
        return view('Backend.user.singleGroup');
    }

}
