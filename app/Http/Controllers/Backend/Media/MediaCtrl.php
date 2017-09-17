<?php

namespace App\Http\Controllers\Backend\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaCtrl extends Controller
{

    function index()
    {
        return view('Backend.media.main');
    }

    /**
     * Thêm mới file
     */
    function addNew()
    {
        return view('Backend.media.mediaAddNew');
    }

}
