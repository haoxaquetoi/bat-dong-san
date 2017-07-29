<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Backend\TagsModel;

class TagCtrl extends Controller {

    function getAll(TagsModel $tagModel) {
        return response()->json($tagModel->get());
    }

}
