<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function show(HomeModel $homeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeModel $homeModel)
    {
        //
    }
}
