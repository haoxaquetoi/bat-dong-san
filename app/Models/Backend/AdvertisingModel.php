<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AdvertisingModel extends Model  {

    protected $table = 'advertising';
    
    /**
     * filter name
     */
    function filterFreeText(&$instance, $freeText) {
        if (strlen($freeText) > 0) {
            $instance = $instance->whereRaw("name like ?", array("%$freeText%"));
        }

        return $this;
    }
    
    /**
     * filter date begindate
     * @param type $beginDate
     * @param type $endDate
     * @return \App\Models\Backend\AdvertisingModel
     */
    function filterBeginDate(&$instance, $beginDate){
        
        if(!empty($beginDate))
        {
            $instance = $instance->whereRaw("DATEDIFF(?, begin_date) <= 0", [$beginDate]);
        }
        
        return $this;
    }
    
    /**
     * filter enddate
     * @param type $endDate
     * @return \App\Models\Backend\AdvertisingModel
     */
    function filterEndDate(&$instance, $endDate){
    
        if(!empty($endDate))
        {
            $instance = $instance->whereRaw("DATEDIFF(?, begin_date) >= 0", [$endDate]);
        }
        return $this;
        
    }

}
