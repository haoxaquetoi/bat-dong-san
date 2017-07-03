<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Permit;
use App\Models\Backend\GroupPermitModel;

class PermitCtrl extends Controller {

    /**
     * Permit
     * @var type 
     */
    private $permit;

    public function __construct() {
        $this->permit = new Permit();
    }

    public function listPermit() {
        return response()->json($this->permit->listPermit());
    }

    public function listPermitOfGroup($id) {
        $arrPermit = GroupPermitModel::where('group_id', $id)->get();
        return response()->json($this->permit->listPermitOfArray($arrPermit));
    }

}
