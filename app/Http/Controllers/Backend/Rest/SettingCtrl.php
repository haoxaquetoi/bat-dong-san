<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\MetadataModel;
use Validator;

class SettingCtrl extends Controller {

    private $listSetting;

    function __construct() {

        $this->listSetting = ['EmailSetting', 'WebInfoSetting'];
    }

    /**
     * lay danh sach setting
     * @param MetadataModel $metadataModel
     * @return type
     */
    function listSetting(MetadataModel $metadataModel) {
        $data = $metadataModel->whereIn('key', $this->listSetting)->get()->map(function($item, $key) {
            $item->value = json_decode($item->value);
            return $item;
        });

        return response()->json($data);
    }
    
    /**
     * thuc hien cap nhat setting
     * @param Request $request
     * @return type
     */
    function updateSetting(Request $request) {
        Validator::make(
                $request->all(), [
            'key' => 'required',
            'value' => 'required',
                ], [
            'key.required' => 'Mã setting không được bỏ trống',
            'value.required' => 'Giá trị setting không được bỏ trống',
                ]
        )->validate();
        //kiem tra da co key chua
        $setting = MetadataModel::where('key', $request->key)->get();
        if ((int) $setting->count() > 0) {//thuc hien update
            $setting->value = json_encode($request->value);
            $setting->save();
        } else {//thuc hien insert
            MetadataModel::insertGetId([
                'key' => $request->key,
                'value' => json_encode($request->value)
            ]);
        }
        return response()->json(['key' => $request->key]);
    }

    /**
     * lay thong tin setting
     * @param type $key
     * @param MetadataModel $metadataModel
     * @return type
     */
    function infoSetting($key, MetadataModel $metadataModel) {
        $data = $metadataModel->where('key', $key)->get();
        return response()->json($data);
    }

}
