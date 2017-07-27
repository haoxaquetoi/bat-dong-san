<?php

namespace App\Libs\Config;

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
}