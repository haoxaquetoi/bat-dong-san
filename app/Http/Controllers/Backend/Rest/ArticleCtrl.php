<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleMode;
use Validator;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\ArticleOtherModel;
use App\Models\Backend\ArticleContactModel;
use App\Models\Backend\ArticleBaseModel;
use Illuminate\Support\Facades\DB;

class ArticleCtrl extends Controller {

    /**
     * Thêm mới tin đăng
     * @param ArticleMode $articleModel
     * @param Request $request
     */
    function addNew(ArticleBaseModel $artBase, ArticleContactModel $artContact, ArticleOtherModel $artOther, CategoryModel $catModel, ArticleMode $articleModel, Request $request) {

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
            $this->_update_product($artBase, $artContact, $artOther, $catModel, $articleModel, $request);
        }
        $articleInfo = $this->getArticleInfo($articleModel, $articleID);
        return response()->json($articleInfo);
    }

    function edit(ArticleBaseModel $artBase, ArticleContactModel $artContact, ArticleOtherModel $artOther, CategoryModel $catModel, ArticleMode $articleModel, Request $request) {

        $this->_chkValidation($articleModel, $catModel, $request);
        $articleID = $request->id;
        $articleInfo = $articleModel::find($articleID);
        $articleInfo->title = $request->title;
        $articleInfo->slug = $request->slug;
        $articleInfo->summary = $request->summary;
        $articleInfo->content = $request->content;
        $articleInfo->type = $request->type;
        $articleInfo->is_sticky = $request->is_sticky ? '1' : '0';
        $articleInfo->status = ($request->status == 'Publish') ? 'Publish' : 'Trash';
        $articleInfo->begin_date = trim($request->begin_date) != '' ? $request->begin_date : null;
        $articleInfo->end_date = trim($request->end_date) != '' ? $request->end_date : null;
        $articleInfo->save();

        if ($articleID == NULL) {
            return response()->json(array('other' => ['Xảy ra lỗi, bạn vui lòng tải lại trang sau đó thao tác lại']), 422);
        }

        if ($request->type == 'Product') {
            $this->_update_product($artBase, $artContact, $artOther, $catModel, $articleModel, $request);
        }

        $articleInfo = $this->getArticleInfo($articleModel, $articleID);
        return response()->json($articleInfo);
    }

    function getArticleInfo(ArticleMode $articleModel, $articleID) {
        $articleInfo = $articleModel::with([
                    'articleBase', 'articleContact', 'articleOther'
                ])->where('id', '=', $articleID)->get();
        if (isset($articleInfo[0]->articleBase->city_id))
            $articleInfo[0]->articleBase->city_name = DB::table('address_city')->find($articleInfo[0]->articleBase->city_id)->name;
        if (isset($articleInfo[0]->articleBase->district_id))
            $articleInfo[0]->articleBase->district_name = DB::table('address_district')->find($articleInfo[0]->articleBase->district_id)->name;
        if (isset($articleInfo[0]->articleBase->village_id))
            $articleInfo[0]->articleBase->village_name = DB::table('address_village')->find($articleInfo[0]->articleBase->village_id)->name;
        if (isset($articleInfo[0]->articleBase->street_id))
            $articleInfo[0]->articleBase->street_name = DB::table('address_street')->find($articleInfo[0]->articleBase->street_id)->name;
        return $articleInfo;
    }

    private function _update_product(ArticleBaseModel $artBase, ArticleContactModel $artContact, ArticleOtherModel $artOther, CategoryModel $catModel, ArticleMode $articleModel, Request $request) {
        //update base
        $artBase::where('article_id', '=', $request->id)->delete();
        $artiBaseID = $artBase::insertGetId([
                    'article_id' => $request->id,
                    'city_id' => $request->articleBase['city_id'],
                    'district_id' => $request->articleBase['district_id'],
                    'village_id' => $request->articleBase['village_id'],
                    'street_id' => $request->articleBase['street_id'],
                    'address' => $request->articleBase['address'],
                    'price' => intval($request->articleBase['price']),
                    'myself' => ($request->myself == '1') ? '1' : '0'
        ]);
        //update other
        $artOther::where('article_id', '=', $request->id)->delete();
        $artOtherID = $artOther::insertGetId([
                    'article_id' => $request->id,
                    'facade' => $request->articleOther['facade'],
                    'entry_width' => $request->articleOther['entry_width'],
                    'house_direction' => $request->articleOther['house_direction'],
                    'balcony_direction' => $request->articleOther['balcony_direction'],
                    'number_of_storeys' => $request->articleOther['number_of_storeys'],
                    'number_of_wc' => intval($request->articleOther['number_of_wc']),
                    'number_of_bedrooms' => intval($request->articleOther['number_of_bedrooms']),
                    'furniture' => intval($request->articleOther['furniture'])
        ]);


        //update contact
        $artContact::where('article_id', '=', $request->id)->delete();
        $artContactID = $artContact::insertGetId([
                    'article_id' => $request->id,
                    'name' => $request->articleContact['name'],
                    'address' => $request->articleContact['address'],
                    'phone' => $request->articleContact['phone'],
                    'mobile' => $request->articleContact['mobile'],
                    'email' => $request->articleContact['email']
        ]);
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
            $rulesOther = [];
            $messageOther = [];
            if ($request->articleOther['facade'] != '') {
                $rulesOther = [
                    'articleOther.facade' => 'numeric',
                ];

                $messageOther = [
                    'articleOther.facade.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->articleOther['entry_width'] != '') {
                $rulesOther = [
                    'articleOther.entry_width' => 'numeric',
                ];

                $messageOther = [
                    'articleOther.entry_width.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->articleOther['number_of_storeys'] != '') {
                $rulesOther = [
                    'articleOther.number_of_storeys' => 'numeric',
                ];
                $messageOther = [
                    'articleOther.number_of_storeys.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->articleOther['number_of_wc'] != '') {
                $rulesOther = [
                    'articleOther.number_of_wc' => 'numeric',
                ];
                $messageOther = [
                    'articleOther.number_of_wc.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->articleOther['number_of_bedrooms'] != '') {
                $rulesOther = [
                    'articleOther.number_of_bedrooms' => 'numeric',
                ];
                $messageOther = [
                    'articleOther.number_of_bedrooms.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->articleOther['furniture'] != '') {
                $rulesOther = [
                    'articleOther.furniture' => 'numeric',
                ];
                $messageOther = [
                    'articleOther.furniture.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            $rules = array_merge($rules, $rulesOther);
            $message = array_merge($message, $messageOther);
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

    function updateSticky(ArticleMode $articleModel, Request $request) {
        $articleInfo = $articleModel::find($request->id);
        $articleInfo->is_sticky = $articleInfo->is_sticky == 0 ? 1 : 0;
        $articleInfo->save();
    }

    function updateCensored(ArticleMode $articleModel, Request $request) {
        $articleInfo = $articleModel::find($request->id);
        $articleInfo->is_censored = $articleInfo->is_censored == 0 ? 1 : 0;
        $articleInfo->save();
    }

    function updateDeleted(ArticleMode $articleModel, Request $request) {
        $articleInfo = $articleModel::find($request->id);
        $articleInfo->deleted = 1;
        $articleInfo->deleted_at = date('Y-m-d h:i:s');
        $articleInfo->save();
    }

    function getAllArticle(ArticleMode $articleModel, Request $request) {

        $request->orderBy;
        $request->page;
        $request->pageSize;

        $articleIstall = $articleModel;

        if ($request->type != '') {
            $articleIstall = $articleIstall->where('type', '=', $request->type);
        }
        if ($request->status != '') {
            $articleIstall = $articleIstall->where('status', '=', $request->status);
        }
        if ($request->deleted != '') {
            $articleIstall = $articleIstall->where('deleted', '=', $request->deleted);
        }
        if ($request->created_at != '') {
            $articleIstall = $articleIstall->where('created_at', '=', $request->created_at);
        }
        if ($request->freeText != '') {
            $articleIstall = $articleIstall->where('title', 'like', "%{$request->freeText}%");
        }


        $data = $articleIstall->paginate();
        return response()->json($data);
    }

}
