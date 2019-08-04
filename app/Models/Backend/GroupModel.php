<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model {

    /**
     * set table xu ly
     * @var type 
     */
    protected $table = 'group';
    public $timestamps = false;

    function filterFreeText($freeText) {
        if(strlen($freeText) > 0)
        {
            return $this->whereRaw("name like ? OR code like ?", array("%$freeText%", "%$freeText%"));
        }
        
        return $this->whereRaw('1>0');
    }
}
