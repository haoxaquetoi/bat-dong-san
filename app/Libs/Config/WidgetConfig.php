<?php

namespace App\Libs\Config;

use App\Models\Backend\MenuModel;
use App\Models\Backend\AdvertisingModel;

class WidgetConfig{
    
    private $listType;
    
    function __construct() {
        $this->listType = [
            'image' => 'Ảnh',
            'freeText' => 'Free Text',
            'adv' => 'Quảng cáo',
            'menu' => 'Menu',
        ];
    }
    
    function getType(){
        return $this->listType;
    }
    
    function cache($widgetInfo)
    {
        $method = '_cache' . strtoupper($widgetInfo->type);
        return $this->$method($widgetInfo);
    }
    
    /**
     * thuc hien luu cach widget image
     * @param type $widgetInfo
     * @return type
     */
    private function _cacheIMAGE($widgetInfo){
        $widgetInfo->cache = $widgetInfo->value;
        return $widgetInfo->save();
    }
    
    /**
     * thuc hien luu cache widget freetext
     * @param type $widgetInfo
     * @return type
     */
    private function _cacheFREETEXT($widgetInfo){
        $widgetInfo->cache = $widgetInfo->value;
        return $widgetInfo->save();
    }
    
    /**
     * thuc hien luu cach widget adv
     * @param type $widgetInfo
     * @return type
     */
    private function _cacheADV($widgetInfo){
        $widgetInfo->cache = $widgetInfo->value;
        return $widgetInfo->save();
    }
    
    /**
     * thuc hien luu cache widget menu
     * @param type $widgetInfo
     * @return type
     */
    private function _cacheMENU($widgetInfo){
        $arrValue = json_decode($widgetInfo->value);
        if(isset($arrValue->menuPositionId) && !empty($arrValue->menuPositionId))
        {
            $menuPositionId = $arrValue->menuPositionId;
        
            $widgetInfo->cache = MenuModel::where('position_id', $menuPositionId)->orderBy('depth')->orderBy('order')->get()->toJson();
        }
        else
        {
            $widgetInfo->cache = '{}';
        }
        return $widgetInfo->save();
    }
}