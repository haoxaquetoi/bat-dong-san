<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    
    function filterFreeText($freeText){
        if(!empty($freeText))
        {
            return $this->whereRaw("name like ?", array("%$freeText%"));
        }
        return $this;
    }
}
