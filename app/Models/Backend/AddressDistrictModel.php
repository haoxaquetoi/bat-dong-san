<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AddressDistrictModel extends Model
{
    protected $table = 'address_district';
    
    function village(){
        return $this->hasMany('App\Models\Backend\AddressVillageModel', 'id', 'district_id');
    }
    
    function filterFreeText($freeText){
        if(!empty($freeText))
        {
            return $this->where('name', 'like', "%$freeText%");
        }
        return $this;
    }
}
