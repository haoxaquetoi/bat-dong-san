<?php

namespace App\Libs\Config;

/**
 * Description of DirectionConfig
 *
 * @author Huong
 */
class SettingConfig {

    private $listSetting;

    function __construct() {
        $this->listSetting = [
            'WebInfoSetting' => 'Thông tin website',
            'EmailSetting' => 'Thông tin Email',
        ];
    }

    function getList() {
        return $this->listSetting;
    }

}
