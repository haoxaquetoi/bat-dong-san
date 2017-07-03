<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupCtrl extends Controller {

    public function index() {
        return view('backend.user.mainGroup');
    }

    public function all() {
        return view('backend.user.group');
    }
    
    public function single() {
        return view('backend.user.singleGroup');
    }

}
