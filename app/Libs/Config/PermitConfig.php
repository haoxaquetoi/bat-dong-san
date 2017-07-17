<?php

namespace App\Libs\Config;

class PermitConfig {

    private $arrPermit;

    public function __construct() {
        $this->arrPermit = [
            [
                'label' => 'Quản trị hệ thống',
                'permit' => [
                    'user' => 'Quản trị người dùng',
                    'group' => 'Quản trị nhóm',
                ]
            ],
            [
                'label' => 'Quản trị nội dung',
                'permit' => [
                    'category' => 'Quản trị chuyên mục'
                ]
            ]
        ];
    }

    public function listPermit() {
        $retVal = $this->arrPermit;

        return $retVal;
    }

    public function checkPermit($code) {
        $retVal = false;
        foreach ($this->arrPermit as $item) {
            if (array_key_exists($code, $item['permit'])) {
                $retVal = true;
                break;
            }
        }
        return $retVal;
    }

    public function listPermitOfArray($data) {
        $retVal = [];
        foreach ($this->arrPermit as $item) {
            foreach ($item['permit'] as $permitCode => $permitName) {
                if($data->contains('permit', $permitCode))
                {
                    $retVal[$permitCode] = $permitName;
                }
            }
        }
        
        return $retVal;
    }

}
