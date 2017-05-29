<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AuthController extends Authenticatable
{

    public function getLogin()
    {

        return view('Frontend.login', []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\AuthModel  $authModel
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $req)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails())
        {
            dd($validator);
        }
        $username = $req->input('username');
        $password = $req->input('password');
        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            dd('done');
        }
        return redirect()->back();
    }

    function logout()
    {
        
    }

}
