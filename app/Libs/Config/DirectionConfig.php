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
            'north' => 'Hướng bắc',
            'northeast' => 'Hướng đông bắc',
            'east' => 'hướng đông',
            'southeast' => 'hướng đông nam',
            'southwest' => 'hướng tây nam',
            'south' => 'hướng nam',
            'west' => 'hướng tây',
            'northwest' => 'hướng tây bắc',
        ];
    }

    function getDirection() {
        return $this->direction;
    }

}
