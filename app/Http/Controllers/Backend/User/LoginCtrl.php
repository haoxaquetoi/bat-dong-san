<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginCtrl extends Controller {
    
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //set redirect to after login
        $this->redirectTo = route('defaultPageAfterLogin');
        $this->middleware('guest')->except('logout');
    }
    
    
    public function showLoginForm()
    {
        return view('backend.user.login');
    }
}
