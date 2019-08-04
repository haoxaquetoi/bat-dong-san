<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AddressStreetModel extends Model
{
    protected $table = 'address_street';
    public $timestamps = false;
    
    function village(){
        return $this->belongsTo('App\Models\Backend\AddressVillageModel');
    }
    
    function filterFreeText(&$instance, $freeText){
        if(!empty($freeText))
        {
            $instance = $instance->where('name', 'like', "%$freeText%");
        }
        return $this;
    }
}
