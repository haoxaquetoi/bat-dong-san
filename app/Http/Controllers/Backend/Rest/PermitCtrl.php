<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\GroupPermitModel;
use App\Models\Backend\UserPermitModel;

class PermitCtrl extends Controller {

    /**
     * Permit
     * @var type 
     */
    private $permit;

    public function __construct() {
        $this->permit = app('PermitConfig');
    }

    public function listPermit() {
        return response()->json($this->permit->listPermit());
    }

    /**
     * rest listPermitGroup
     * @param type $id
     * @return type
     */
    public function listPermitOfGroup($id) {
        $arrPermit = $this->__getListPermitOfGroup($id);
        return response()->json($arrPermit);
    }

    public function __getListPermitOfGroup($id) {
        $arrPermit = GroupPermitModel::where('group_id', $id)->get();
        return $this->permit->listPermitOfArray($arrPermit);
    }

    public function listPermitOfUser($id) {
        $arrPermit = $this->__getListPermitOfUser($id);
        return response()->json($arrPermit);
    }
    
    public function __getListPermitOfUser($id) {
        $arrPermit = UserPermitModel::where('user_id', $id)->get();
        return $this->permit->listPermitOfArray($arrPermit);
    }
}
