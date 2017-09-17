<?php
namespace App\Http\Controllers\Backend\Widget;

use App\Http\Controllers\Controller;

class WidgetCtrl extends Controller {

    function main() {
       
        return view('Backend/widget/main');
    }
    
    function all() {
       
        return view('Backend/widget/listWidget');
    }
    
    function widgetItem($type){
        $view = 'backend/widget/type/' . $type;
        return view($view);
    }
}
