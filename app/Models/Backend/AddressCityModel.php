<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AddressCityModel extends Model
{
    protected $table = 'address_city';
    
    function district(){
        return $this->hasMany('App\Models\Backend\AddressDistrictModel', 'id', 'city_id');
    }
    
    function filterFreeText($freeText){
        if(!empty($freeText))
        {
            return $this->where('name', 'like', "%$freeText%");
        }
        return $this;
    }
}
