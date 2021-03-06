<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\WidgetModel;

class WidgetCtrl extends Controller
{
    function listWidget($positionCode, WidgetModel $widgetModel){
        $data = $widgetModel->where('position_code', $positionCode)->orderBy('order')->get()->map(function($item, $key) {
            $item->cache = json_decode($item->cache);
            if($item->type == 'adv')
            {
                if(isset($item->cache->adv) && !empty($item->cache->adv))
                {
                    if(app('MyFunc')->dateDiff(Date('Y-m-d'), $item->cache->adv->end_date) > 0)
                    {
                        $item->cache = [];
                    }
                }
            }
            return $item;
        });
        
        return response()->json($data);
    }
    
}
