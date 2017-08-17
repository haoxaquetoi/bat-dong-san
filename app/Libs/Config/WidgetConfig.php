<?php

namespace App\Libs\Config;

use App\Models\Backend\MenuModel;
use App\Models\Backend\AdvertisingModel;
use App\Models\Backend\MetadataModel;

class WidgetConfig{
    
    private $listType;
    
    function __construct() {
        $this->listType = [
            'image' => 'Ảnh',
            'freeText' => 'Free Text',
            'adv' => 'Quảng cáo',
            'menu' => 'Menu',
            'webInfo' => 'Thông tin website',
            'analytics' => 'Thống kê truy cập',
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
     * thuc hien luu cache widget website info
     * @param type $widgetInfo
     */
    private function _cacheWEBINFO($widgetInfo){
        $settingConfig = app('SettingConfig');
        $value = json_decode($widgetInfo->value);
        $title = (isset($value->title) && !empty($value->title))? $value->title: '';
        $class = (isset($value->class) && !empty($value->class))? $value->class: '';
        $info = MetadataModel::where('key', $settingConfig::WEBINFO_CODE)->first();
        $widgetInfo->cache = json_encode([
            'title' => $title,
            'class' => $class,
            'info' => json_decode($info->value),
        ]);
        return $widgetInfo->save();
    }
    
    /**
     * thuc hien luu cache widget website info
     * @param type $widgetInfo
     */
    private function _cacheANALYTICS($widgetInfo){
        $value = json_decode($widgetInfo->value);
        $title = (isset($value->title) && !empty($value->title))? $value->title: '';
        $class = (isset($value->class) && !empty($value->class))? $value->class: '';
        $widgetInfo->cache = json_encode([
            'title' => $title,
            'class' => $class,
        ]);
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
            $title = (isset($arrValue->title) && !empty($arrValue->title))? $arrValue->title: '';
            $class = (isset($arrValue->class) && !empty($arrValue->class))? $arrValue->class: '';
            $instance = $this;
            $menus = MenuModel::where('position_id', $menuPositionId)->orderBy('depth')->orderBy('order')->get()->map(function($item, $key) use ($instance) {
                $item->href = $instance->buildMenuHref($item->type, json_decode($item->value));
                return $item;
            })->toArray();
            $widgetInfo->cache = json_encode([
                'title' => $title,
                'class' => $class,
                'menus' => $menus
            ]);
        }
        else
        {
            $widgetInfo->cache = '{}';
        }
        return $widgetInfo->save();
    }
    
    /**
     * thuc hien tao href cho widget menu
     * @param type $type
     * @param type $data
     * @return type
     */
    private function buildMenuHref($type, $data){
        return app('MenuConfig')->buildHref($type, $data);
    }
    
}