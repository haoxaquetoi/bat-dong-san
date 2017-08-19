<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend\Rest;

/**
 * Description of SearchCtrl
 *
 * @author Minh
 */
class SearchCtrl {
    
    function getParamsSearch(){
        $data = app('ParamsSearchConfig')->getParamsSearch();
        return response()->json($data);
    }
}
