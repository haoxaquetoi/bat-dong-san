<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AdvertisingModel extends Model {

    protected $table = 'advertising';
    
    /**
     * filter name
     */
    function filterFreeText($freeText) {
        if (strlen($freeText) > 0) {
            $this->whereRaw("name like ?", array("%$freeText%"));
        }

        return $this;
    }
    
    /**
     * filter date
     * @param type $beginDate
     * @param type $endDate
     * @return \App\Models\Backend\AdvertisingModel
     */
    function filterBeginDate($beginDate, $endDate){
        
        if(!empty($beginDate))
        {
            $this->whereRaw("DATEDIFF(?, begin_date) <= 0", [$beginDate]);
        }
        
        if(!empty($endDate))
        {
            $this->whereRaw("DATEDIFF(?, begin_date) >= 0", [$endDate]);
        }
        
        return $this;
    }

}
