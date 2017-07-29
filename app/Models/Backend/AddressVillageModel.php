<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AddressVillageModel extends Model
{
    protected $table = 'address_village';
    
    function street(){
        return $this->hasMany('App\Models\Backend\AddressStreetModel', 'id', 'village_id');
    }
    
    function district(){
        return $this->belongsTo('App\Models\Backend\AddressDistrictModel');
    }
    
    function filterFreeText($freeText){
        if(!empty($freeText))
        {
            return $this->where('name', 'like', "%$freeText%");
        }
        return $this;
    }
}
