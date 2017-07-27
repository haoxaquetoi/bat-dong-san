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

    /**
     * thuc hien them moi menu
     * @param Request $request
     * @return type
     */
    function insertMenu(Request $request) {
        //check validate
        $this->_validateUpdateInsert($request);
        
        //thuc hien them moi menu
        $newId = MenuModel::insertGetId([
            "name" => $request->name,
            "type" => $request->type,
            "position_id" => $request->position_id,
            "parent" => $request->parent,
            "order" => $request->order,
            "depth" => '/',
            "value" => $request->value,
        ]);
        
        //thuc hien order lai
        $this->_reorder($newId, $request->parent, $request->order);
        
        return response()->json(['id' => $newId]);
    }
    
    /**
     * thuc hien cap nhat menu
     * @param Request $request
     * @return type
     */
    function updateMenu(Request $request) {
        //check validate
        $this->_validateUpdateInsert($request);
        
        //thuc hien update
        $menu = MenuModel::find($request->id);
        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->position_id = $request->position_id;
        $menu->parent = $request->parent;
        $menu->order = $request->order;
        $menu->order = $request->order;
        $menu->value = $request->value;
        $menu->save();
        
        //thuc hien order lai
        $this->_reorder($request->id, $request->parent, $request->order);
        
        return response()->json(['id' => $request->id]);
    }
    
    private function _validateUpdateInsert($request){
        //check id
        if(isset($request->id) && !empty($request->id) && $request->id > 0)
        {
            Validator::make(
                ['id' => $request->id],
                ['id' => 'required|exists:menu,id'],
                [
                    'id.required' => 'Mã menu không được bỏ trống',
                    'id.exists' => 'Mã menu không tồn tại'
                ]
            )->validate();
        }
        
        //validate
        Validator::make(
            $request->all(), 
            [
                "name" => 'required',
                "type" => 'required',
                "position_id" => 'required|exists:menu_position,id',
                "parent" => 'required|numeric',
                "order" => 'required|numeric',
                "value" => 'required',
            ],
            [
                'name.required' => "Tên menu không được bỏ trống",
                'type.required' => "Loại menu không được bỏ trống",
                'position_id.required' => "Vị trí menu không được bỏ trống",
                'parent.required' => "Menu cha không được bỏ trống",
                'order.required' => "Vị trí sắp xếp không được bỏ trống",
                'value.required' => "Giá trị menu không được bỏ trống",
                'position_id.exists' => "Vị trí menu không tồn tại",
                'parent.numeric' => "Menu cha phải là dạng số",
                'order.numeric' => "Vị trí sắp xếp phải là dạng số",
            ]
        )->validate();
        //validate type
        if(!in_array($request->type, array_keys(app('MenuConfig')->getMenuType())))
        {
            return response()->json(array('type' => ['Loại menu không tồn tại']), 422);
        }
        
        //validate parent
        $this->_validateParent($request->parent);
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
                'parent' => 'required|numeric',
                'order' => 'required|numeric'
            ],
            [
                'id.required' => 'Bắt buộc phải có id menu',
                'id.exists' => 'id menu không tồn tại',
                'parent.required' => 'Bắt buộc phải có parent',
                'order.required' => 'Bắt buộc phải có order',
                'parent.numeric' => 'Định dạng không đúng',
                'order.numeric' => 'Định dạng không đúng',
            ]
        )->validate(); 
         $this->_validateParent($request->parent);
        $this->_reorder($request->id, $request->parent, $request->order);
        return response()->json(['id' => $request->id]);
    }
    
    /**
     * thuc hien reorder menu
     * @param type $id
     * @param type $parent
     * @param type $order
     */
    private function _reorder($id, $parent, $order){
        $curMenuInfo = MenuModel::find($id);
        $listMenuOrder = MenuModel::where('parent', $parent)
                        ->where('id', '<>', $id)->orderBy('order')->get();
        //thuc hien sap xep lai order
        $tmpOrder = (int) $order;
        foreach($listMenuOrder as $menu)
        {
            if((int)$menu->order >= $tmpOrder)
            {
                $menu->order = $tmpOrder + 1;
                $tmpOrder = $menu->order;
                $menu->save();
            }
        }
        
        //cap nhat curMenuInfo
        $curMenuInfo->parent = $parent;
        $curMenuInfo->order = $order;
        $depth = '/';
        if((int) $parent > 0)
        {
            $parentMenuInfo = MenuModel::find($parent);
            $depth = $parentMenuInfo->depth . $parentMenuInfo->id . '/';
        }
        $curMenuInfo->save();
    }
    
    /**
     * thuc hien kiem tra ma menu cha co ton tai ko
     * @param type $parent
     */
    private function _validateParent($parent){
        if((int) $parent > 0)
        {
            Validator::make(
                ['parent' => $parent],
                ['parent' => 'exists:menu,id'],
                ['parent.exists' => 'Mã cấp cha không tồn tại']
            )->validate();
        }
    }
    
    function listMenuType(){
        return response()->json(app('MenuConfig')->getMenuType());
    }
}

