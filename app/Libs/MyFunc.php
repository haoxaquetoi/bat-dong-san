<?php

namespace App\Libs;


class MyFunc {

    function __construct() {
    }
    
    /**
     * Ham tinh toan so sanh thoi gian $date1 - $date 2
     * @param \App\Libs\DateTime $date1
     * @param \App\Libs\DateTime $date2
     * @return type
     */
    function dateDiff($date1, $date2){
        $date1 = new \DateTime($date1);
        $date2 = new \DateTime($date2);
        $interval = $date2->diff($date1);
        return (int)$interval->format('%R%a days');
    }

}
