<?php

namespace App\Libs\Config;

/**
 * Description of DirectionConfig
 *
 * @author Huong
 */
class SettingConfig {

    private $listSetting;
    
    const WEBINFO_CODE = 'WebInfoSetting';
    const EMAIL_CODE = 'EmailSetting';

    function __construct() {
        $this->listSetting = [
            self::WEBINFO_CODE => 'Thông tin website',
            self::EMAIL_CODE => 'Thông tin Email',
        ];
    }

    function getList() {
        return $this->listSetting;
    }

}
