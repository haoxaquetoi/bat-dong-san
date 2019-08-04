<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AddressDistrictModel extends Model
{
    protected $table = 'address_district';
    public $timestamps = false;
    
    function village(){
        return $this->hasMany('App\Models\Backend\AddressVillageModel', 'id', 'district_id');
    }
    
    function city(){
        return $this->belongsTo('App\Models\Backend\AddressCityModel');
    }
    
    function filterFreeText(&$instance, $freeText){
        if(!empty($freeText))
        {
            $instance = $instance->where('name', 'like', "%$freeText%");
        }
        return $this;
    }
    
    
}
