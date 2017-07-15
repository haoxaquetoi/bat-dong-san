<?php

namespace App\Libs\Config;

class MenuConfig{
    
    private $menuType;
    
    function __construct() {
        $this->menuType = [
            'url' => 'url',
            'article' => 'Tin bài',
            'category' => 'Chuyên mục',
        ];
    }
    
    function getMenuType(){
        return $this->menuType;
    }
}