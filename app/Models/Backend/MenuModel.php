<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    public $timestamps = false;
    
    function filterFreeText($freeText){
        
        if(strlen($freeText) > 0)
        {
            return $this->whereRaw("name like ?", ["%$freeText%"]);
        }
        return $this;
    }
}
