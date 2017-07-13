<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\MenuPositionModel;
use App\Models\Backend\MenuModel;
use Validator;

class MenuCtrl extends Controller {
    
     public function __construct() {
        header('Content-Type: application/json');
    }

    /**
     * thuc hien insert menu position
     * @param Request $request
     * @param MenuPositionModel $menuPostionModel
     * @return type
     */
    function insertMenuPosition(Request $request, MenuPositionModel $menuPostionModel) {
        Validator::make(
                $request->all(), ['name' => 'required'], ['name.required' => 'Tên vị trí không được bỏ trống']
        )->validate();

        $newId = $menuPostionModel::insertGetId(
                        ['name' => $request->name]
        );
        return response()->json(['id' => $newId]);
    }

    /**
     * thuc hien cap nhat vi tri menu
     * @param Request $request
     * @param MenuPositionModel $menuPostionModel
     * @return type
     */
    function updateMenuPosition(Request $request, MenuPositionModel $menuPostionModel) {
        Validator::make(
                $request->all(), [
            'name' => 'required',
            'id' => 'required|exists:menu_position,id',
                ], [
            'id.require' => 'Không được bỏ trống id',
            'id.exists' => 'id không tồn tại',
            'name.required' => 'Tên vị trí không được bỏ trống'
                ]
        )->validate();

        $menuPosition = $menuPostionModel::find($request->id);
        $menuPosition->name = $request->name;
        $menuPosition->save();

        return response()->json(['id' => $request->id]);
    }
    
    /**
     * Thuc hien xoa vi tri menu
     * @param type $id
     * @return type
     */
    function deleteMenuPosition($id) {
        Validator::make(
            ['id' => $id],
            ['id' => 'required|exists:menu_position,id'],
            [
                'id.require' => 'Không được bỏ trống id',
                'id.exists' => 'id không tồn tại',
            ]
        )->validate();
        
        MenuPositionModel::find($id)->delete();
        
        return response()->json(['id' => $id]);
    }
    
    /**
     * lay toan bo danh sach vi tri menu
     * @return type
     */
    function listMenuPosition() {
        $data = MenuPositionModel::all();
        return response()->json($data);
    }

    
    function insertMenu() {
        
    }

    function updateMenu() {
        
    }
    
    /**
     * xoa menu
     * @param type $id
     * @return type
     */
    function deleteMenu($id) {
        MenuModel::find($id)->delete();
        return response()->json(['id' => $id]);
    }
    
    /**
     * Danh sach menu
     * @param Request $request
     * @param type $positionId
     * @param MenuModel $menuModel
     * @return type
     */
    function listMenu(Request $request, $positionId, MenuModel $menuModel) {
        Validator::make(
            ['positionId' => $positionId],
            ['positionId' => 'required|exists:menu,position_id'],
            [
                'positionId.required' => 'Bắt buộc phải có vị trí menu',
                'positionId.exists' => 'Vị trí menu không tồn tại'
            ]
        )->validate();
        $data = $menuModel->filterFreeText($request->freeText)->wherer('position_d', $positionId)->paginate();
        return response()->json($data);
    }
    
    /**
     * lay thong tin menu
     * @param type $id
     * @return type
     */
    function infoMenu($id) {
        $data = MenuModel::find($id);
        return response()->json($data);
    }
    
    /**
     * thuc hien reorder menu
     * @param Request $request
     * @return type
     */
    function reOrderMenu(Request $request) {
         Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:menu,id',
                'parent' => 'required',
                'order' => 'required'
            ],
            [
                'id.required' => 'Bắt buộc phải có id menu',
                'id.exists' => 'id menu không tồn tại',
                'parent.required' => 'Bắt buộc phải có parent',
                'order.required' => 'Bắt buộc phải có order',
            ]
        )->validate(); 
        $this->_reorder($request->id, $request->parent, $request->order);
        return response()->json(['id' => $request->id]);
    }
    
    function _reorder($id, $parent, $order){
        
    }
}
