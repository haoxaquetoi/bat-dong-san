<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleModel;
use Validator;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\ArticleOtherModel;
use App\Models\Backend\ArticleContactModel;
use App\Models\Backend\ArticleBaseModel;
use App\Models\Backend\CategoryArticleModel;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\TagsAricleModel;
use App\Models\Backend\TagsModel;

class ArticleCtrl extends Controller {

    /**
     * Thêm mới tin đăng
     * @param ArticleModel $articleModel
     * @param Request $request
     */
    function addNew(TagsAricleModel $tagArtModel, TagsModel $TagsModel, CategoryArticleModel $catArtModel, ArticleBaseModel $artBase, ArticleContactModel $artContact, ArticleOtherModel $artOther, CategoryModel $catModel, ArticleModel $articleModel, Request $request) {

        $this->_chkValidation($articleModel, $catModel, $request);

        $articleID = $articleModel::insertGetId([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'summary' => $request->summary,
                    'content' => $request->content,
                    'thumbnail' => $request->thumbnail,
                    'type' => $request->type,
                    'is_sticky' => $request->is_sticky ? '1' : '0',
                    'is_censored' => $request->is_censored ? '1' : '0',
                    'is_sold' => $request->is_sold ? '1' : '0',
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

        $arrCatID = $request->category;
        $this->update_category_article($catArtModel, $articleID, $arrCatID);
        $this->updateTag($tagArtModel, $TagsModel, $request, $articleID);

        $articleInfo = $this->getArticleInfo($articleModel, $articleID);
        return response()->json($articleInfo);
    }

    function edit(TagsAricleModel $tagArtModel, TagsModel $TagsModel, CategoryArticleModel $catArtModel, ArticleBaseModel $artBase, ArticleContactModel $artContact, ArticleOtherModel $artOther, CategoryModel $catModel, ArticleModel $articleModel, Request $request) {


        $this->_chkValidation($articleModel, $catModel, $request);
        $articleID = $request->id;
        $articleInfo = $articleModel::find($articleID);
        $articleInfo->title = $request->title;
        $articleInfo->slug = $request->slug;
        $articleInfo->summary = $request->summary;
        $articleInfo->content = $request->content;
        $articleInfo->thumbnail = $request->thumbnail;
        $articleInfo->type = $request->type;
        $articleInfo->is_sticky = $request->is_sticky ? '1' : '0';
        $articleInfo->is_censored = $request->is_censored ? '1' : '0';
        $articleInfo->is_sold = $request->is_sold ? '1' : '0';
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
        $arrCatID = $request->category;

        $this->update_category_article($catArtModel, $articleID, $arrCatID);
        
        
        $this->updateTag($tagArtModel, $TagsModel, $request, $articleID);
        $articleInfo = $this->getArticleInfo($articleModel, $articleID);
        return response()->json($articleInfo);
    }

    function update_category_article(CategoryArticleModel $catArtModel, $articleID, array $arrCatID = array()) {
        
        $catArtModel::where('article_id', '=', $articleID)->delete();
        for ($i = 0; $i < count($arrCatID); $i ++) {
            $catArtModel::insertGetId([
                'category_id' => $arrCatID[$i],
                'article_id' => $articleID
            ]);
        }
        
    }

    function updateTag(TagsAricleModel $tagArtModel, TagsModel $TagsModel, Request $request, $articleID) {
        $arrTags = is_array($request->tags) ? $request->tags : [];
        $arrtagTmp = [];
        foreach ($arrTags as $k => $v) {
            $tagInfo = $TagsModel::where('code', '=', $v)->first();

            if (isset($tagInfo->id) && $tagInfo->id > 0) {
                //update count
                $tagInfo->count = $tagInfo->count + 1;
                $tagInfo->save();
                $arrtagTmp[] = $tagInfo->id;
            } else {
                //insert
                $arrtagTmp[] = $TagsModel->insertGetId([
                    'code' => $v,
                    'count' => 1
                ]);
            }
        }
        //insert tags by article
        $tagArtModel::where('article_id', '=', $articleID)->delete();
        foreach ($arrtagTmp as $k => $v) {
            $tagArtModel->insertGetId([
                'tag_id' => (int) $v,
                'article_id' => (int) $articleID
            ]);
        }
    }

    function getArticleInfo(ArticleModel $articleModel, $articleID) {
        $articleInfo = $articleModel::with([
                    'article_base', 'article_contact', 'article_other'
                ])->where('id', '=', $articleID)->get();
        if (isset($articleInfo[0]->article_base->city_id))
            $articleInfo[0]->article_base->city_name = DB::table('address_city')->find($articleInfo[0]->article_base->city_id)->name;
        if (isset($articleInfo[0]->article_base->district_id))
            $articleInfo[0]->article_base->district_name = DB::table('address_district')->find($articleInfo[0]->article_base->district_id)->name;
        if (isset($articleInfo[0]->article_base->village_id))
            $articleInfo[0]->article_base->village_name = DB::table('address_village')->find($articleInfo[0]->article_base->village_id)->name;
        if (isset($articleInfo[0]->article_base->street_id))
            $articleInfo[0]->article_base->street_name = DB::table('address_street')->find($articleInfo[0]->article_base->street_id)->name;

        $categoryTmp = array();
        $category = DB::table('category_article')->where('article_id', '=', $articleID)->select('category_id')->get();
        $category = collect($category)->toArray();
        foreach ($category as $key => $value) {
            $categoryTmp[] = (int) $value->category_id;
        }
        $articleInfo[0]->category = $categoryTmp;

        $tags = DB::table('tag_article')->where('article_id', '=', $articleID)->select('tag_id')->get();
        $tags = collect($tags)->toArray();
        $tagsTmp = [];
        foreach ($tags as $key => $value) {
            $tagInfo = DB::table('tag')->find($value->tag_id);
            if (isset($tagInfo->code)) {
                $tagsTmp[] = $tagInfo->code;
            }
        }
        $articleInfo[0]->tags = $tagsTmp;


        if ($articleInfo[0]->begin_date != '')
            $articleInfo[0]->begin_date = explode(' ', $articleInfo[0]->begin_date)[0];

        if ($articleInfo[0]->end_date != '')
            $articleInfo[0]->end_date = explode(' ', $articleInfo[0]->end_date)[0];

        return $articleInfo[0];
    }

    private function _update_product(ArticleBaseModel $artBase, ArticleContactModel $artContact, ArticleOtherModel $artOther, CategoryModel $catModel, ArticleModel $articleModel, Request $request) {
        //update base
        $artBase::where('article_id', '=', $request->id)->delete();
        $artiBaseID = $artBase::insertGetId([
                    'article_id' => $request->id,
                    'city_id' => $request->article_base['city_id'],
                    'district_id' => $request->article_base['district_id'],
                    'village_id' => $request->article_base['village_id'],
                    'street_id' => $request->article_base['street_id'],
                    'address' => $request->article_base['address'],
                    'price' => intval($request->article_base['price']),
                    'myself' => ($request->article_base['myself'] == '1') ? '1' : '0'
        ]);
        //update other
        $artOther::where('article_id', '=', $request->id)->delete();
        $artOtherID = $artOther::insertGetId([
                    'article_id' => $request->id,
                    'facade' => $request->article_other['facade'],
                    'entry_width' => $request->article_other['entry_width'],
                    'house_direction' => $request->article_other['house_direction'],
                    'balcony_direction' => $request->article_other['balcony_direction'],
                    'number_of_storeys' => $request->article_other['number_of_storeys'],
                    'number_of_wc' => intval($request->article_other['number_of_wc']),
                    'number_of_bedrooms' => intval($request->article_other['number_of_bedrooms']),
                    'furniture' => intval($request->article_other['furniture'])
        ]);


        //update contact
        $artContact::where('article_id', '=', $request->id)->delete();
        $artContactID = $artContact::insertGetId([
                    'article_id' => $request->id,
                    'name' => $request->article_contact['name'],
                    'address' => $request->article_contact['address'],
                    'phone' => $request->article_contact['phone'],
                    'mobile' => $request->article_contact['mobile'],
                    'email' => $request->article_contact['email']
        ]);
    }

    /**
     * Kiểm tra các giá trị hợp lệ dùng trung trước khi update article
     */
    private function _chkValidation(ArticleModel $articleModel, CategoryModel $catModel, Request $request) {

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
            'summary.required' => 'Nội dung tóm tắt không được bỏ trống',
            'content.required' => 'Nội dung đăng không được bỏ trống'
        ];



        if ($request->type === 'News') {
            $rules['summary'] = "required";
            $message['summary.required'] = 'Nội dung tóm tắt không được bỏ trống';
        } else if ($request->type == 'Product') {

            $rulesBase = [
                'article_base.city_id' => 'required|exists:address_city,id',
                'article_base.district_id' => 'required|exists:address_district,id',
                'article_base.village_id' => 'required|exists:address_village,id',
                'article_base.street_id' => 'required|exists:address_street,id',
                'article_base.address' => 'required',
                'article_base.price' => 'required|integer',
            ];
            $rules = array_merge($rules, $rulesBase);

            #######Base########
            $messageBase = [
                'article_base.city_id.required' => 'Tỉnh/thành phố không được bỏ trống',
                'article_base.city_id.exists' => 'Tỉnh/thành phố không hợp lệ',
                'article_base.district_id.required' => 'Quận/Huyện phố không được bỏ trống',
                'article_base.district_id.exists' => 'Quận/Huyện không hợp lệ',
                'article_base.village_id.required' => 'Phường/Xã không được bỏ trống',
                'article_base.village_id.exists' => 'Phường/Xã phố không hợp lệ',
                'article_base.street_id.required' => 'Đường/phố không được bỏ trống',
                'article_base.street_id.exists' => 'Đường/phố không hợp lệ',
                'article_base.address.required' => 'Không được bỏ trống',
                'article_base.price.required' => 'Không được bỏ trống',
                'article_base.price.integer' => 'Giá tiền phải >0',
            ];
            $message = array_merge($message, $messageBase);

            #######Contact########
            $rulesContact = [
                'article_contact.name' => 'required',
                'article_contact.address' => 'required',
//                'article_contact.phone'=>'required|min:9|numeric',
                'article_contact.mobile' => 'required|min:9|numeric',
                'article_contact.email' => 'email'
            ];
            $rules = array_merge($rules, $rulesContact);


            $messageContact = [
                'article_contact.name.required' => 'Tên liên hệ không được bỏ trống',
                'article_contact.address.required' => 'Tên liên hệ không được bỏ trống',
                'article_contact.email.email' => 'Địa chỉ email không hợp lệ',
                'article_contact.mobile.required' => 'Số điện thoại liên hệ không được bỏ trống',
                'article_contact.mobile.numeric' => 'Số điện thoại không hợp lệ',
                'article_contact.mobile.min' => 'Số điện thoại ít nhất 9 chữ số'
            ];
            $message = array_merge($message, $messageContact);


            #######other########
            $rulesOther = [];
            $messageOther = [];
            if ($request->article_other['facade'] != '') {
                $rulesOther = [
                    'article_other.facade' => 'numeric',
                ];

                $messageOther = [
                    'article_other.facade.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->article_other['entry_width'] != '') {
                $rulesOther = [
                    'article_other.entry_width' => 'numeric',
                ];

                $messageOther = [
                    'article_other.entry_width.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->article_other['number_of_storeys'] != '') {
                $rulesOther = [
                    'article_other.number_of_storeys' => 'numeric',
                ];
                $messageOther = [
                    'article_other.number_of_storeys.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->article_other['number_of_wc'] != '') {
                $rulesOther = [
                    'article_other.number_of_wc' => 'numeric',
                ];
                $messageOther = [
                    'article_other.number_of_wc.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->article_other['number_of_bedrooms'] != '') {
                $rulesOther = [
                    'article_other.number_of_bedrooms' => 'numeric',
                ];
                $messageOther = [
                    'article_other.number_of_bedrooms.numeric' => 'Chỉ có thể nhập kiểu số',
                ];
            }
            if ($request->article_other['furniture'] != '') {
                $rulesOther = [
                    'article_other.furniture' => 'numeric',
                ];
                $messageOther = [
                    'article_other.furniture.numeric' => 'Chỉ có thể nhập kiểu số',
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
        if (isset($request->article_contact['house_direction']) && trim($request->article_contact['house_direction']) != '' && !in_array($request->article_contact['house_direction'], array_keys($getDirection))) {
            $errors = [
                'article_contact.house_direction' => 'Hướng nhà không hợp lệ'
            ];
            $this->withValidator($validator, $errors);
        }

        if (isset($request->article_contact['balcony_direction']) && trim($request->article_contact['balcony_direction']) != '' && !in_array(article_contact['balcony_direction'], array_keys($getDirection))) {
            $errors = [
                'article_contact.balcony_direction' => 'Hướng ban công không hợp lệ'
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
                        ['slug', '=', "{$request->slug}"],
                        ['id', '!=', $request->id]
                    ])->count() > 0) {
                $errors = [
                    'slug' => 'Đường dẫn đã tồn tại vui lòng chọn đường dẫn khác'
                ];
                $this->withValidator($validator, $errors);
            }
        }

        $request->category = is_array($request->category) ? $request->category : [];
        if (count($request->category) == 0) {
            $errors = [
                'category' => 'Chưa chọn chuyên mục'
            ];
            $this->withValidator($validator, $errors);
        }



        $validator->validate();
    }

    function updateSticky(ArticleModel $articleModel, Request $request) {
        $articleInfo = $articleModel::find($request->id);
        $articleInfo->is_sticky = $articleInfo->is_sticky == 0 ? 1 : 0;
        $articleInfo->save();
    }

    function updateCensored(l $articleModel, Request $request) {
        $articleInfo = $articleModel::find($request->id);
        $articleInfo->is_censored = $articleInfo->is_censored == 0 ? 1 : 0;
        $articleInfo->save();
    }

    function deleted(ArticleModel $articleModel, Request $request) {
        $articleInfo = $articleModel::find($request->id);
        $articleInfo->deleted = 1;
        $articleInfo->deleted_at = date('Y-m-d h:i:s');
        $articleInfo->save();
    }

    function getAllArticle(ArticleModel $articleModel, Request $request) {

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

    function getSingleArticle(ArticleModel $articleModel, Request $request) {
        $request->id;
        #######Common########
        $rules = [
            "id" => "exists:article,id"
        ];
        $message = [
            'id.exists' => 'Tin đăng không tồn tại'
        ];
        $data = $this->getArticleInfo($articleModel, $request->id);
        return response()->json($data);
    }

}
