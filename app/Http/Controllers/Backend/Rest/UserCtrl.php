<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class UserCtrl extends Controller {

    protected $rules = [
        'name' => 'required|max:255',
        'phone' => 'nullable|max:255',
        'job_title' => 'nullable|max:255',
        'email' => 'required|email',
    ];
    protected $message = [
        'name.required' => 'Họ tên không được bỏ trống',
        'name.max' => 'Họ tên không được dài quá 255 ký tự',
        'phone.max' => 'Số điện thoại không hợp lệ',
        'email.required' => 'Địa chỉ email không được bỏ trống',
        'email.email' => 'Địa chỉ email không hợp lệ'
    ];

    public function __construct() {
        header('Content-Type: application/json');
    }

    /**
     * get user info by id
     * @param Request $request
     * @param type $id
     */
    public function userInfo($id) {
        $userInfo = User::findOrFail($id);
        return response()->json($userInfo);
    }

    /**
     * get current user info
     * @param Request $request
     * @return type
     */
    public function curUserInfo(Request $request) {
        return response()->json(Auth::user());
    }

    /**
     * lay danh sach user
     * @param Request $request
     */
    function getAllUser(Request $request) {
        $limit = 10;
        $arrWhere = [];
        $ouID = isset($request['ou_id']) ? $request['ou_id'] : 0;
        $users = \App\User::where('ou_id', '=', $ouID)->orderBy('id', 'desc')->get();
        return response()->json($users);
    }

    /**
     * Dem so user theo dieu kien
     * @param type $status
     */
    function countUser($status = null) {
        $count['deleted'] = \App\User::where('deleted', '=', 1)->count();
        $count['active'] = \App\User::where('active', '=', 1)->count();
        $count['unActive'] = \App\User::where('active', '=', 0)->count();
        $count['all'] = \App\User::count();
        return response()->json($count);
    }

    /**
     * Cập nhật thông tin user
     * @param Request $request
     * @return type
     */
    function editUser(Request $request) {
        $this->chkValidationUser($request);
        $chkUserExists = \App\User::where([
                    ['email', '=', $request['email']],
                    ['id', '<>', $request['id']]
                ])->first();

        if (isset($chkUserExists->id)) {
            return response()->json(array('email' => ['Địa chỉ này đã tồn tại']), 422);
        }

        $user = \App\User::findOrFail($request['id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->job_title = $request['job_title'];
        $user->active = $request['active'];
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return response()->json(User::find($request['id']));
    }

    protected function chkValidationUser($request) {
        $validator = Validator::make($request->all(), $this->rules, $this->message)->validate();
    }

    /**
     * Thêm mới user
     */
    function insertUser(Request $request) {
        $this->chkValidationUser($request);
        $chkEmailExists = \App\User::where([
                    ['email', '=', $request['email']]
                ])->first();
        if (isset($chkEmailExists->id)) {
            return response()->json(array('email' => ['Địa chỉ này đã tồn tại']), 422);
        }

        if ($request['password'] == '') {
            return response()->json(array('password' => ['Mật khẩu không được bỏ trống']), 422);
        }
        if ($request['confirm_password'] == '') {
            return response()->json(array('confirm_password' => ['Mật khẩu xác nhận không hợp lệ']), 422);
        }

        if ($request['password'] !== $request['confirm_password']) {
            return response()->json(array('confirm_password' => ['Mật khẩu xác nhận không hợp lệ']), 422);
        }

        $userId = \App\User::insertGetId([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'phone' => $request['phone'],
                    'job_title' => $request['job_title'],
                    'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($userId)
            return response()->json(User::find($request['id']));
    }

    /**
     * Xóa thông tin người sử dụng
     * @param Request $request
     * @return type
     */
    function trashUser(Request $request) {
        $userInfo = \App\User::where([
                    ['id', '=', $request['id']]
                ])->first();

        if (!isset($userInfo->id)) {
            return response()->json('Thông tin người sử dụng không hợp lệ!', 422);
        }
        if ($userInfo->is_admin == 1) {
            return response()->json('Bạn không có quyền xóa người sử dụng này!', 422);
        }
        $user = \App\User::findOrFail($request['id']);
        $user->deleted = 1;
        $user->deleted_at = date('Y-m-d H:i:s');
        $user->save();
        return response()->json(array());
    }

    /**
     * Xóa vĩnh viễn thông tin người sử dụng
     * @param Request $request
     * @return type
     */
    function deleteUser(Request $request) {
        $userInfo = \App\User::where([
                    ['id', '=', $request['id']]
                ])->delete();
        return response()->json(array());
    }

    /**
     * Khôi phục người dùng đã xóa
     * @param Request $request
     * @return type
     */
    function publishUser(Request $request) {
        $userInfo = \App\User::where([
                    ['id', '=', $request['id']]
                ])->first();
        $userInfo->deleted = 0;
        $userInfo->updated_at = date('Y-m-d H:i:s');
        $userInfo->deleted_at = null;
        $userInfo->save();
        return response()->json(array());
    }

    function paginateUser(Request $request, User $userModel) {
        $reqData = $request->toArray();
        $resData = $userModel->filterFreeText($reqData['freeText'])->paginate();
        return response()->json($resData);
    }

}
