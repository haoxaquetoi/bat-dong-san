<?php

namespace App\Libs\Config;

class ThemeConfig{
    
    private $widgetPosition;
    
    function __construct() {
        $this->widgetPosition = [
            'header' => 'Header',
            'footer' => 'Footer',
            'homeSideBar' => 'SideBar Trang chủ',
            'categorySideBar' => 'SideBar Chuyên mục, Tìm kiếm',
            'articleSideBar' => 'SideBar Tin bài',
            
        ];
    }
    
    function getWidgetPosition(){
        return $this->widgetPosition;
    }
}