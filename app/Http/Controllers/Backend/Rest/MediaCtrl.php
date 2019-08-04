<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use App\Models\Backend\MediaModel;

class MediaCtrl extends Controller
{

    function mediaAddNew(Request $request, MediaModel $mediaModel)
    {
        $newsItem = $mediaModel::find(0);
        $newsItem->addMediaFromRequest('file')->toMediaCollection('images');
    }

}
