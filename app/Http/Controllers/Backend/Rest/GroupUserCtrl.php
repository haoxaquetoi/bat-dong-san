<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\GroupUserModel;
use App\User;

class GroupUserCtrl extends Controller {

    function listUser(Request $request, $groupID) {
        $arrUserID = GroupUserModel::select('user_id')->where('group_id', $groupID)->get();
        $data = User::find($arrUserID)->keyBy('id');
        
        return response()->json($data);
    }

}
