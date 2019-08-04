<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class OuModel extends Model
{

    /**
     * table name
     * @var string 
     */
    protected $table = 'ou';
    
    /**
     * Lay danh sach ou theo ma parent_id
     * @param int $parent_id
     * @return array
     */
    function getAllOu($parent_id = 0)
    {
        $ou = $this->where('parent_id', '=', "$parent_id")->get();
        for ($i = 0; $i < count($ou); $i++)
        {
            $parent_id = $ou[$i]['id'];
            $countChild = $this->where('parent_id', '=', "$parent_id")->count();
            if ($countChild)
            {
                $ou[$i]['children'] = $this->getAllOu($parent_id);
            }
        }
        return $ou;
    }

}
