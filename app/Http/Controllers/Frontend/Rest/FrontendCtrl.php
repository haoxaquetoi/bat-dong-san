<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\FeedBackPostModel;
use Validator;

class FrontendCtrl extends Controller {

    function __construct() {
        parent::__construct();
        header('Content-Type: application/json; charset=utf-8');
    }

    function sendFeedBack(FeedBackPostModel $feedPostModel, Request $request) {
        if ($request->getMethod() == 'POST') {
            $articleID = $request->articleID;
            $feedBackID = $request->feedBackID;
            $captChaVal = $request->captChaVal;
            $txtContenFb = isset($request->txtContenFb) ? $request->txtContenFb : '';
            $rules = ['captChaVal' => 'required|captcha'];
            if (intval($feedBackID) == 1 && trim($txtContenFb) == '') {
                return response()->json('Nội góp ý không được để trống', 422);
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json('Mã bảo vệ không hợp lệ, Xin vui lòng nhập lại', 422);
            } else {
                $feedPostModel->updateFeedBack($articleID, $feedBackID, $txtContenFb);
                return response()->json('');
            }
        } else {
            return response()->json('Bạn không có quyền truy cập chức năng này !!!', 422);
        }
    }

}
