<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SingleTagCtrl extends Controller {

    function main() {
		$data['paramsSearch'] = app('ParamsSearchConfig')->getParamsSearch();
        echo 'tags';
    }

}
