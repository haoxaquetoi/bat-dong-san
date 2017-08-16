<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\WidgetModel;

class WidgetCtrl extends Controller
{
    function listWidget($positionCode, WidgetModel $widgetModel){
        $data = $widgetModel->where('position_code', $positionCode)->get()->map(function($item, $key) {
            $item->cache = json_decode($item->cache);
            return $item;
        });
        return response()->json($data);
    }
    
}
