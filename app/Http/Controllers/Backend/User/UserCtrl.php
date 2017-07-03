<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserCtrl extends Controller
{
    public function index(){
        return view('backend/user/user');
    }
}
