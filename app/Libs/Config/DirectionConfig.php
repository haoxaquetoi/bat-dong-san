<?php

namespace App\Libs\Config;

/**
 * Description of DirectionConfig
 *
 * @author Huong
 */
class DirectionConfig {

    private $direction;

    function __construct() {
        $this->direction = [
            'north' => 'Bắc',
            'northeast' => 'Đông bắc',
            'east' => 'Đông',
            'southeast' => 'Đông nam',
            'southwest' => 'Tây nam',
            'south' => 'Nam',
            'west' => 'Tây',
            'northwest' => 'Tây bắc',
        ];
    }

    function getDirection() {
        return $this->direction;
    }

}
