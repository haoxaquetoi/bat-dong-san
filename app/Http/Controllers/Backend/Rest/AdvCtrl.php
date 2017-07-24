<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\AdvertisingModel;
use Validator;

class AdvCtrl extends Controller {

    function __construct() {
        header('Content-Type: application/json');
    }
    /**
     * lay danh sach quang cao theo pagging
     * @param Request $request
     * @param AdvertisingModel $advModel
     * @return type
     */
    function listAdv(Request $request, AdvertisingModel $advModel) {
        $reqData = $request->toArray();
        $freeText = (isset($reqData['freeText']) && !empty($reqData['freeText'])) ? $reqData['freeText'] : '';
        $beginDate = (isset($reqData['begin_date']) && !empty($reqData['freeText'])) ? $reqData['begin_date'] : '';
        $endDate = (isset($reqData['end_date']) && !empty($reqData['freeText'])) ? $reqData['end_date'] : '';

        $data = $advModel->filterFreeText($freeText)->filterBeginDate($beginDate)->filterEndDate($endDate)->orderBy('begin_date', 'desc')->paginate();
        return response()->json($data);
    }

    /**
     * lay thong tin cua quang cao
     * @param type $id
     * @param AdvertisingModel $advModel
     * @return type
     */
    function infoAdv($id, AdvertisingModel $advModel) {
        $data = $advModel->find($id);
        return response()->json($data);
    }
    
    /**
     * insert thong tin 
     * @param \App\Http\Controllers\Backend\Rest\Requst $request
     * @param AdvertisingModel $advModel
     * @return type
     */
    function insertAdv(Requst $request, AdvertisingModel $advModel) {
        //checkvalidate
        $this->_validateUpdate($request);

        $data = $request->toArray();
        $newID = $advModel::insertGetId([
                'name' => $data['name'],
                'url' => $data['url'],
                'begin_date' => $data['begin_date'] . '0:0:0',
                'end_date' => $data['end_date']  . '0:0:0',
                'file_path' => $data['file_path'],
                'status' => $data['status'],
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        return response()->json($newID);
    }
    
    /**
     * thuc hien cap nhat quang cao
     * @param Request $request
     * @param AdvertisingModel $advModel
     * @return type
     */
    function updateAdv(Request $request, AdvertisingModel $advModel) {
        $reqData = $request->toArray();
        //checkvalidate id
        Validator::make(
            ['id' => $reqData['id']],
            ['id' => 'required|exists:advertising,id']
        )->validate();
        //checkvalidate data
        $this->_validateUpdate($request);
        
        //thuc hien update
        $adv = $advModel::find($reqData['id']);
        $adv->name = $reqData['name'];
        $adv->url = $reqData['url'];
        $adv->begin_date = $reqData['begin_date']. '0:0:0';
        $adv->end_date = $reqData['end_date']. '0:0:0';
        $adv->file_path = $reqData['file_path'];
        $adv->status = $reqData['status'];
        $adv->updated_at = Date('Y-m-d H:i:s');

        $adv->save();
        
        return response()->json(['id' => $reqData['id']]);
    }
    
    /**
     * thuc hien xoa quang cao
     * @param type $id
     * @param AdvertisingModel $advModel
     * @return type
     */
    function deleteAdv($id, AdvertisingModel $advModel) {
        //checkvalidate id
        Validator::make(
            ['id' => $id],
            ['id' => 'required|exists:advertising,id']
        )->validate();
        
        //thuc hien xoa adv
        $advModel::find($id)->delete;
        
        return response()->json(['id' => $id]);
    }
    
    private function _validateUpdate($request){
        
        $rules = [
            'name' => 'required',
            'url' => 'url',
            'begin_date' => 'required|date_format:"Y-m-d"',
            'end_date' => 'required|date_format:"Y-m-d"',
            'file_path' => 'required',
        ];
        $message = [
            'name.required' => 'Tên quảng cáo không được bỏ trống',
            'url.url' => 'Định dạng url không đúng',
            'begin_date.required' => 'Bắt buộc phải có ngày bắt đầu',
            'end_date.required' => 'Bắt buộc phải có ngày kết thúc',
            'begin_date.date_format' => 'Định dạng datetime không đúng',
            'end_date.date_format' => 'Định dạng datetime không đúng',
            'file_path.required' => 'Phải nhập file ảnh',
        ];
        
        Validator::make($request->all(), $rules, $message)->validate();
    }
}
