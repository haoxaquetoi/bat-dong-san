<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WidgetCtrl extends Controller
{
    function index(){
        return view('Frontend.widget.main');
    }
    
    function typeWidget($positionCode, $type){
        $defaultView = 'Frontend.widget.' . $type . 'Widget';
        $positionView = 'Frontend.widget.' . $positionCode . '.' . $type . 'Widget';
        if(View::exists($positionView)){
            $view = $positionView;
        }
        else {
            $view = $defaultView;
        }
        return view($view);
    }
}
