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
        return view('Backend.user.login');
    }
    
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin');
    }
}
