<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        parent::__construct();
        if (!Auth::check())
        {
            return redirect()->route('login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.dashboard');
    }

}
