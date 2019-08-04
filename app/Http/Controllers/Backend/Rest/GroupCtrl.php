<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Backend\GroupModel;
use App\Models\Backend\GroupUserModel;
use App\Models\Backend\GroupPermitModel;

class GroupCtrl extends Controller {

    protected $rules = [
        'name' => 'required|max:255',
        'code' => 'required|max:255',
    ];
    protected $message = [
        'name.required' => 'Tên không được bỏ trống',
        'name.max' => 'Tên không được dài quá 255 ký tự',
        'code.required' => 'Mã nhóm không được bỏ trống',
        'code.max' => 'Mã nhóm không được dài quá 255 ký tự',
    ];

    public function __construct() {
        parent::extendValidator();
        header('Content-Type: application/json');
        
    }

    /**
     * them moi group
     * @param Request $request
     * @param GroupModel $groupModel
     * @return type
     */
    public function insertGroup(Request $request, GroupModel $groupModel) {
        //checkvalidate
        $this->chkValidationGroup($request);

        $data = $request->toArray();
        $newID = $groupModel::insertGetId([
                    'name' => $data['name'],
                    'code' => $data['code'],
        ]);

        $this->updateGroupUser($newID, $data['arrUser']);
        $this->updateGroupPermit($newID, $data['arrPermit']);
        return response()->json($newID);
    }

    /**
     * sua group
     * @param Request $request
     * @param GroupModel $groupModel
     * @return type
     */
    public function updateGroup(Request $request, GroupModel $groupModel) {
        $data = $request->toArray();
        //checkvalidate
        $this->chkValidationGroup($request);

        $group = $groupModel::find($data['id']);
        $group->name = $data['name'];
        $group->code = $data['code'];

        $group->save();

        $this->updateGroupUser($data['id'], $data['arrUser']);
        $this->updateGroupPermit($data['id'], $data['arrPermit']);

        return response()->json($groupModel::find($data['id']));
    }

    /**
     * danh sach nhom
     * @param Request $request
     * @param GroupModel $groupModel
     * @return type
     */
    public function listGroup(Request $request, GroupModel $groupModel) {
        $reqData = $request->toArray();
        $freeText = (isset($reqData['freeText']) && !empty($reqData['freeText'])) ? $reqData['freeText'] : '';
        $resData = $groupModel
                ->filterFreeText($freeText)
                ->addSelect(\DB::raw('*'))
                ->addSelect(\DB::raw('(Select count(*) From group_user where group_id = group.id) as count_user'))
                ->paginate();
        return response()->json($resData);
    }
    
    /**
     * lay thong tin chi tiet cua 1 nhom
     * @param Request $request
     * @param GroupModel $groupModel
     * @param type $id
     * @return type
     */
    public function infoGroup(Request $request, GroupModel $groupModel, $id) {
        $data = $groupModel::find($id);
        return response()->json($data);
    }
    
    /**
     * check validate group khi update va insert
     * @param type $request
     */
    protected function chkValidationGroup($request) {
        Validator::make($request->all(), $this->rules, $this->message)->validate();
    }
    
    /**
     * thuc hien insert user vao nhom
     * @param type $groupId
     * @param type $arrUser
     */
    private function updateGroupUser($groupId, $arrUser) {
        GroupUserModel::where('group_id', $groupId)->delete();
        $data = [];
        foreach ($arrUser as $userID) {
            $data[] = [
                'group_id' => $groupId,
                'user_id' => $userID
            ];
        }
        GroupUserModel::insert($data);
    }
    
    private function updateGroupPermit($groupId, $arrPermit){
        GroupPermitModel::where('group_id', $groupId)->delete();
        $data = [];
        foreach ($arrPermit as $permit) {
            $data[] = [
                'group_id' => $groupId,
                'permit' => $permit
            ];
        }
        GroupPermitModel::insert($data);
    }
    
    /**
     * xoa nhom
     * @param GroupModel $groupModel
     * @param type $id
     * @return type
     */
    public function deleteGroup(GroupModel $groupModel, $id) {
        //validate
        Validator::make(
            ['id' => $id], 
            ['id' => 'required|not_exists:group_user,group_id'], 
            [
                'id.required' => 'Bắt buộc phải có mã nhom', 
                'id.not_exists' => 'Vẫn tồn tại người dùng, không được phép xóa'
            ])->validate();
        //thuc hien xoa
        $result = $groupModel->find($id)->delete();
        return response()->json($result);
    }

}
