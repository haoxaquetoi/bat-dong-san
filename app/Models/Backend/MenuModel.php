<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    
    
    function filterFreeText($freeText){
        
        if(strlen($freeText) > 0)
        {
            $this->whereRaw("name like ?", ["%$freeText%"]);
        }
        return $this;
    }
}
