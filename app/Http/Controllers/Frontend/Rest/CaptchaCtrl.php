<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaptchaCtrl extends Controller {

    function refreshCaptcha() {
        echo captcha_src();
    }

}
