<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\OuModel;
use Validator;

class OuCtrl extends Controller
{

    protected $rules = [
        'name' => 'required|max:255',
        'code' => 'required|max:255',
    ];
    protected $message = [
        'name.required' => 'Tên không được bỏ trống',
        'name.max' => 'Tên không được dài quá 255 ký tự',
        'code.required' => 'Mã đơn vị không được bỏ trống',
        'code.max' => 'Mã đơn vị không được dài quá 255 ký tự',
    ];

    public function __construct()
    {
        header('Content-Type: application/json');
    }

    protected function chkValidationOu($request)
    {
        Validator::make($request->all(), $this->rules, $this->message)->validate();
    }

    function insert(Request $request, OuModel $ouModel)
    {
        $this->chkValidationOu($request);
        $chkCode = $ouModel::where('code', '=', $request['code'])->count();
        if ($chkCode > 0)
        {
            return response()->json(array('code' => ['Mã đơn vị đã tồn tại']), 422);
        }
        $chkparent_id = $ouModel::where('id', '=', $request['parent_id'])->count();
        if ($chkparent_id == 0 && $request['parent_id'] != 0)
        {
            return response()->json(array('parent_id' => ['Mã đơn vị trực thuộc không hợp lệ']), 422);
        }

        $ouID = $ouModel::insertGetId([
                    'name' => $request['name'],
                    'code' => $request['code'],
                    'parent_id' => $request['parent_id'] || 0
        ]);
        if ($ouID > 0)
        {
            $resp = array('status' => true);
        }
        else
        {
            $resp = array('status' => false);
        }
        return response()->json($resp);
    }

    function editOu(Request $request, OuModel $ouModel)
    {
        $this->chkValidationOu($request);
        $chkOuExists = $ouModel::where('id', '=', $request['id'])->count();
        if ($chkOuExists != 1)
        {
            return response()->json(array('other' => ['Đơn vị lựa chọn không hợp lệ']), 422);
        }
        $chkOuParentExists = $ouModel::where([
                    ['id', '=', $request['parent_id']],
                    ['id', '!=', $request['id']]
                ])->count();
        if ($chkOuParentExists != 1 && $request['parent_id'] != 0)
        {
            return response()->json(array('parent_id' => ['Mã đơn vị trực thuộc không hợp lệ']), 422);
        }

        $ou = $ouModel::findOrFail($request['id']);
        $ou->name = $request['name'];
        $ou->code = $request['code'];
        $ou->parent_id = $request['parent_id'];
        $ou->save();
        return response()->json($ouModel::find($request['id']));
    }

    function deleted()
    {
        
    }

    function getOuInfo()
    {
        
    }

    /**
     * Load all ou
     * @param OuModel $ouModel
     * @return json
     */
    function getAllOu(OuModel $ouModel, Request $request, $parent_id = 0)
    {
        $parent_id = isset($request['parent_id']) ? $request['parent_id'] : $parent_id;
        $ou = $ouModel->getAllOu($parent_id);
        return response()->json($ou);
    }

}
