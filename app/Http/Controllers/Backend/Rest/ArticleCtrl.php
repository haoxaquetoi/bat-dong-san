<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleMode;
use Validator;
use App\Models\Backend\CategoryModel;

class ArticleCtrl extends Controller {

    /**
     * Thêm mới tin đăng
     * @param ArticleMode $articleModel
     * @param Request $request
     */
    function addNew(CategoryModel $catModel, ArticleMode $articleModel, Request $request) {

        $this->_chkValidation($articleModel, $catModel, $request);

        $articleID = $articleModel::insertGetId([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'summary' => $request->summary,
                    'content' => $request->content,
                    'type' => $request->type,
                    'is_sticky' => $request->is_sticky ? '1' : '0',
                    'status' => ($request->status == 'Publish') ? 'Publish' : 'Trash',
                    'begin_date' => trim($request->begin_date) != '' ? $request->begin_date : null,
                    'end_date' => trim($request->end_date) != '' ? $request->end_date : null,
                    'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($articleID == NULL) {
            return response()->json(array('other' => ['Xảy ra lỗi, bạn vui lòng tải lại trang sau đó thao tác lại']), 422);
        }

        if ($request->type == 'Product') {
            
        }
        $articleInfo = $articleModel::with([
                    'articleBase', 'articleContact', 'articleOther'
                ])->where('id', '=', $articleID)->get();
        return response()->json($articleInfo);
    }

    /**
     * Kiểm tra các giá trị hợp lệ dùng trung trước khi update article
     */
    private function _chkValidation(ArticleMode $articleModel, CategoryModel $catModel, Request $request) {
        
        #######Common########
        $rules = [
            "slug" => "required|max:255",
            "title" => "required|max:255",
            "content" => "required"
        ];
        $message = [
            'title.required' => 'Tiêu đề tin đăng không được bỏ trống',
            'title.max' => 'Tiêu đề không được lớn hơn 255 ký tự',
            'slug.required' => 'Đường dẫn slug không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại vui lòng chọn đường dẫn khác',
            'summary.required' => 'Nội dung tóm tắt không được bỏ trống',
            'content.required' => 'Nội dung đăng không được bỏ trống'
        ];



        if ($request->type === 'News') {
            $rules['summary'] = "required";
            $message['summary.required'] = 'Nội dung tóm tắt không được bỏ trống';
        } else if ($request->type == 'Product') {

            $rulesBase = [
                'articleBase.city_id' => 'required|exists:address_city,id',
                'articleBase.district_id' => 'required|exists:address_district,id',
                'articleBase.village_id' => 'required|exists:address_village,id',
                'articleBase.street_id' => 'required|exists:address_street,id',
                'articleBase.address' => 'required',
                'articleBase.price' => 'required|integer',
            ];
            $rules = array_merge($rules, $rulesBase);
            
            #######Base########
            $messageBase = [
                'articleBase.city_id.required' => 'Tỉnh/thành phố không được bỏ trống',
                'articleBase.city_id.exists' => 'Tỉnh/thành phố không hợp lệ',
                'articleBase.district_id.required' => 'Quận/Huyện phố không được bỏ trống',
                'articleBase.district_id.exists' => 'Quận/Huyện không hợp lệ',
                'articleBase.village_id.required' => 'Phường/Xã không được bỏ trống',
                'articleBase.village_id.exists' => 'Phường/Xã phố không hợp lệ',
                'articleBase.street_id.required' => 'Đường/phố không được bỏ trống',
                'articleBase.street_id.exists' => 'Đường/phố không hợp lệ',
                'articleBase.address.required' => 'Không được bỏ trống',
                'articleBase.price.required' => 'Không được bỏ trống',
                'articleBase.price.integer' => 'Giá tiền phải >0',
            ];
            $message = array_merge($message, $messageBase);

            #######Contact########
            $rulesContact = [
//                'articleContact.name'=>'',
//                'articleContact.address'=>'required|exists:address_district,id',
//                'articleContact.phone'=>'required|min:9|numeric',
                'articleContact.mobile' => 'required|min:9|numeric',
                'articleContact.email' => 'email'
            ];
            $rules = array_merge($rules, $rulesContact);

            
            $messageContact = [
                'articleContact.email.email' => 'Địa chỉ email không hợp lệ',
                'articleContact.mobile.required' => 'Số điện thoại liên hệ không được bỏ trống',
                'articleContact.mobile.numeric' => 'Số điện thoại không hợp lệ',
                'articleContact.mobile.min' => 'Số điện thoại ít nhất 9 chữ số'
            ];
            $message = array_merge($message, $messageContact);
            
            
            #######other########
            $rulesContact = [
               
            ];
            $rules = array_merge($rules, $rulesContact);

            
            $messageContact = [
            ];
        }


        if (intval($request->id) == 0) {

            $rules['slug'] = "required|max:255|unique:article,slug";
            $message['slug.unique'] = 'Đường dẫn đã tồn tại vui lòng chọn đường dẫn khác';
        }

        $validator = Validator::make($request->all(), $rules, $message);

        //check category
        if (!is_array($request->category) OR count($request->category) == 0) {
            $errors = [
                'category' => 'Chưa chọn chuyên mục'
            ];
            $this->withValidator($validator, $errors);
        } else {
            $countCat = $catModel::whereIn('id', $request->category)->where('status', '=', 1)->count();
            if (count($request->category) != $countCat) {
                $errors = [
                    'category' => 'Tồn tại chuyên mục lựa chọn không hợp lệ'
                ];
                $this->withValidator($validator, $errors);
            }
        }

        $getDirection = app('DirectionConfig')->getDirection();
        if (isset($request->articleContact['house_direction']) && trim($request->articleContact['house_direction']) != '' && !in_array($request->articleContact['house_direction'], array_keys($getDirection))) {
            $errors = [
                'articleContact.house_direction' => 'Hướng nhà không hợp lệ'
            ];
            $this->withValidator($validator, $errors);
        }

        if (isset($request->articleContact['balcony_direction']) && trim($request->articleContact['balcony_direction']) != '' && !in_array(articleContact['balcony_direction'], array_keys($getDirection))) {
            $errors = [
                'articleContact.balcony_direction' => 'Hướng ban công không hợp lệ'
            ];
            $this->withValidator($validator, $errors);
        }

        if (intval($request->id) > 0) {
            //Xét trường hợp edit
            if ($articleModel::where('id', '=', $request->id)->count() != 1) {
                $errors = [
                    'other' => 'Xảy ra lỗi, tin đăng không tồn tại'
                ];
                $this->withValidator($validator, $errors);
            }
            if ($articleModel::where([
                            ['slug', '!=', "{$request->slug}"],
                            ['id', '=', $request->id]
                    ])->count() > 0) {
                $errors = [
                    'slug' => 'Đường dẫn đã tồn tại vui lòng chọn đường dẫn khác'
                ];
                $this->withValidator($validator, $errors);
            }
        }


        $validator->validate();
    }

}
