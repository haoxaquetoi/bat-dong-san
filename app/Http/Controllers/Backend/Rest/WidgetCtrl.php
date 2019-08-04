<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\WidgetModel;
use Validator;

class WidgetCtrl extends Controller {

    public function __construct() {
        header('Content-Type: application/json');
    }

    /**
     * lay danh sach loai widget
     * @return type
     */
    function listWidgetType() {
        return response()->json(app('WidgetConfig')->getType());
    }

    /**
     * danh sach vi tri widget cua theme
     * @return type
     */
    function listWidgetPosition() {
        $respData = [];
        $listPosition = app('ThemeConfig')->getWidgetPosition();
        foreach($listPosition as $key => $name){
            $respData[$key]['name'] = $name;
            $respData[$key]['data'] = WidgetModel::where('position_code', $key)->orderBy('order')->get();
        }
        return response()->json($respData);
    }

    /**
     * thuc hien insert widget
     * @param Request $request
     * @return type
     */
    function insertWidgetItem(Request $request) {
        $this->_validateInsert($request);
        $this->_validatePositionCode($request->position_code);
        $this->_validateWidgetType($request->type);
        
        $newId = WidgetModel::insertGetId([
            "position_code" => $request->position_code,
            "type" => $request->type,
            "value" => json_encode(empty($request->value)? []: $request->value),
            "order" => $request->order
        ]);
        
        //thuc hien reorder
        $this->_reOrder($newId, $request->position_code, $request->order);
        
        return response()->json(['id' => $newId]);
    }
    
    /**
     * thuc hien cap nhat widget
     * @param Request $request
     * @param type $id
     * @return type
     */
    function updateWidgetItem(Request $request, $id) {
        $this->_validateId($id);
        
        $widget = WidgetModel::find($id);
        $widget->value = json_encode(empty($request->value)? []: $request->value);
        $widget->save();
        return response()->json(['id' => $id]);
    }
    
    /**
     * thuc hien validate id
     * @param type $id
     */
    private function _validateId($id)
    {
        Validator::make(
            ['id' => $id],
            ['id' => 'required|exists:widget,id'],
            [
                'id.required' => 'id không được bỏ trống',
                'id.exists' => 'id không tồn tại'
            ]
        )->validate();
    }
    
    /**
     * thuc hien validate danh cho method insert
     * @param type $request
     */
    private function _validateInsert($request)
    {
        Validator::make(
            $request->all(),
            [
                'position_code' => 'required',
                'type' => 'required',
//                'value' => 'required',
                'order' => 'required|numeric',
            ],
            [
                'position_code.required' => 'position_code không được bỏ trống',
                'type.required' => 'type không được bỏ trống',
                'value.required' => 'value không được bỏ trống',
                'order.required' => 'order không được bỏ trống',
                'order.numeric' => 'order không phải dạng số'
            ]
        )->validate();
    }
    
    /**
     * thuc hien validate position code
     * @param type $positionCode
     * @return type
     */
    private function _validatePositionCode($positionCode)
    {
        $themeConfig = app('ThemeConfig');
        if(!in_array($positionCode, array_keys($themeConfig->getWidgetPosition())))
        {
            return response()->json(['position_code' => 'position_code không tồn tại'], 422);
        }
    }
    
    /**
     * thuc hien validate loai widget
     * @param type $type
     * @return type
     */
    private function _validateWidgetType($type)
    {
        $widgetConfig = app('WidgetConfig');
        if(!in_array($type, array_keys($widgetConfig->getType())))
        {
            return response()->json(['type' => 'Loại widget không tồn tại'], 422);
        }
    }
    /**
     * thuc hien xóa widget item
     * @param type $id
     * @return type
     */
    function deleteWidgetItem($id) {
        Validator::make(
                ['id' => $id], ['id' => 'exists:widget,id'], ['id.exists' => 'Widget không tồn tại']
        )->validate();
        WidgetModel::find($id)->delete();
        return response()->json(['id' => $id]);
    }
    
    /**
     * Thuc hien sap xep lại vi tri widget
     * @param Request $request
     * @return type
     */
    function reOrderWidgetItem(Request $request) {
        //validate
        $this->_validateId($request->id);
        Validator::make(
            ['order' => $request->order],
            ['order' => "required|numeric"],
            [
                'order.required' => "Order không được bỏ trống",
                'order.numeric' => "Định dạng order không đúng"
            ]
        )->validate();
        $this->_validatePositionCode($request->position_code);
        //thuc hien reorder
        $this->_reOrder($request->id, $request->position_code, $request->order);
        
        return response()->json(['id' => $request->id]);
    }
    
    /**
     * thuc hien reorder widget
     * @param type $id
     * @param type $position_code
     * @param type $order
     */
    private function _reOrder($id, $position_code, $order){
        $curWidget = WidgetModel::find($id);
        $listWidgetOrder = WidgetModel::where('id', '<>', $id)->where('position_code', $position_code)->orderBy('order')->get();
        $tmpOrder = $order;
        foreach($listWidgetOrder as $item)
        {
            if((int)$item->order >= $tmpOrder)
            {
                $item->order = $tmpOrder + 1;
                $tmpOrder = $item->order;
                $item->save();
            }
        }
        $curWidget->order = $order;
        $curWidget->save();
    }
    
    
    function cacheWidget() {
        $arrAllWidget = WidgetModel::all();
        $widgetConfigInstance = app('WidgetConfig');
        foreach($arrAllWidget as $widgetInfo)
        {
            $widgetConfigInstance->cache($widgetInfo);
        }
        return response()->json(['status' => true]);
    }

}
