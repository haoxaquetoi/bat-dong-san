<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    function extendValidator() {
        \Validator::extend('not_exists', function($attribute, $value, $parameters) {
            return \DB::table($parameters[0])
                            ->where($parameters[1], '=', $value)
                            ->count() < 1;
        });
    }

}
