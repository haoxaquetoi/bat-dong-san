<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AddressStreetModel extends Model
{
    protected $table = 'address_street';
    public $timestamps = false;
    
    function filterFreeText($freeText){
        if(!empty($freeText))
        {
            return $this->where('name', 'like', "%$freeText%");
        }
        return $this;
    }
}