<?php

namespace App\Http\Controllers\Backend\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaCtrl extends Controller
{

    function index()
    {
        return view('backend.media.main');
    }

    /**
     * Thêm mới file
     */
    function addNew()
    {
        return view('backend.media.mediaAddNew');
    }

}
