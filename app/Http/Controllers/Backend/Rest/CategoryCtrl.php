<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryModel;
use Validator;

class CategoryCtrl extends Controller
{

    protected $rules = [
        'name' => 'required|max:255',
        'slug' => 'required|max:255',
        'parent_id' => 'integer',
        'order' => 'integer',
        'type' => 'nullable|max:255',
    ];
    protected $message = [
        'name.required' => 'Tên chuyên mục không được bỏ trống',
        'slug.required' => 'Đường dẫn slug không được bỏ trống',
        'name.max' => 'Tên chuyên mục không được dài quá 255 ký tự',
        'slug.max' => 'Đường dẫn slug không hợp lệ',
        'order.number' => 'Thứ tự hiển thị không hợp lệ'
    ];

    /**
     * Kiểm tra chuyên mục cha có tồn tại hay không
     * @param CategoryModel $catModel
     * @param int $currentCatID Mã chuyên mục hiện tại đang xét
     * @param int $parent_id Mã chuyên mục cha
     * @return boolean TRUE exists else FALSE
     */
    private function _validParent(CategoryModel $catModel, $currentCatID,
            $parent_id = 0)
    {
        if (intval($parent_id) == 0)
        {
            return TRUE;
        }
        $count = $catModel::where([
                    ['id', '!=', intval($currentCatID)],
                    ['id', '=', intval($parent_id)]
                ])->count();
        return $count > 0 ? TRUE : FALSE;
    }

    function insertCategory(Request $request, CategoryModel $catModel)
    {
        Validator::make($request->all(), $this->rules, $this->message)->validate();
        $countCat = $catModel::where([['slug', '=', $request->slug]])->count();
        if ($countCat > 0)
        {
            return response()->json(array('slug' => ['slug đã tồn tại']), 422);
        }
        if (!$this->_validParent($catModel, 0, $request['parent_id']))
        {
            return response()->json(array('parent_id' => ['Chuyên mục cha không hợp lệ']), 422);
        }

        $catID = $catModel::insertGetId([
                    'name' => $request['name'],
                    'slug' => $request['slug'],
                    'parent_id' => intval($request['parent_id']),
                    'order' => intval($request['order']),
                    'type' => $request['type'],
                    'status' => $request['status'] ? 1 : 0,
                    'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($catID)
            return response()->json($catModel::find($catID));
        else
        {
            return response()->json(array('status' => false));
        }
    }

    function updateCategory(Request $request, CategoryModel $catModel)
    {
        Validator::make($request->all(), $this->rules, $this->message)->validate();
        $countCat = $catModel::where([
                    ['slug', '=', $request->slug],
                    ['id', '!=', $request->id]
                ])->count();
        if ($countCat > 0)
        {
            return response()->json(array('slug' => ['slug đã tồn tại']), 422);
        }
        if (!$this->_validParent($catModel, $request->id, $request->parent_id))
        {
            return response()->json(array('parent_id' => ['Chuyên mục cha không hợp lệ ']), 422);
        }
        $cat = $catModel::findOrFail($request->id);
        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->order = $request->order;
        $cat->parent_id = intval($request->parent_id);
        $cat->type = $request->type;
        $cat->status = $request->status ? 1 : 0;
        $cat->updated_at = date('Y-m-d H:i:s');
        $cat->save();
        return response()->json($cat);
    }

    function getAllCategory(CategoryModel $catModel, Request $request,
            $parent_id = 0)
    {
        $parent_id = isset($request['parent_id']) ? $request['parent_id'] : $parent_id;
        $cat = $catModel->getAllCat($parent_id);
        return response()->json($cat);
    }

    /**
     * Xóa chuyên mục
     */
    function deleteCategory(CategoryModel $catModel, Request $request)
    {
        $countChildren = $catModel::where([
                    ['parent_id', '=', $request->id]
                ])->count();
        if ($countChildren > 0)
        {
            return response()->json('Cần phải xóa hết các chuyên mục con trước khi xóa chuyên mục này!' . $request->id, 422);
        }
        $resp = $catModel::where([['id', '=', $request->id]])->delete();
        if (!$resp)
        {
            return response()->json('Thao tác thất bại, Bạn vui lòng tải lại trang sau đó thao tác lại!', 422);
        }
        return response()->json($resp);
    }

}
