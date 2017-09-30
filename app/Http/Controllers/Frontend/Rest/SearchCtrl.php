<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend\Rest;
use Illuminate\Http\Request;
/**
 * Description of SearchCtrl
 *
 * @author Minh
 */
class SearchCtrl {

    function getParamsSearch(Request $request) {
        $city_active = isset($request->ct) ? $request->ct : NULL;
        $district_active = isset($request->dt) ? $request->dt : NULL;
        $village_active = isset($request->vil) ? $request->vil : NULL;
        $data = app('ParamsSearchConfig')->getParamsSearch($city_active, $district_active, $village_active);
        return response()->json($data);
    }

}
