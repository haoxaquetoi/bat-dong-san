<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\CrawlerModel;
use Validator;

class CrawlerCtrl extends Controller {

    protected $rules = [
        'website_name' => 'required|max:500',
        'website_url' => 'required|max:500',
    ];
    protected $message = [
        'website_name.required' => 'Tên website không được bỏ trống',
        'website_url.required' => 'Đường dẫn truy cập website không được bỏ trống',
        'website_name.max' => 'Tên website không được dài quá 255 ký tự',
        'website_url.max' => 'Đường dẫn truy cập website không được dài quá 255 ký tự',
    ];

    function getAllCrawler(CrawlerModel $crawlerModel, Request $request) {
        $filter['keywork'] = isset($request->keywork) ? $request->keywork : null;
        $crawlers = $crawlerModel->getAllCrawler(null, null, $filter);
        return response()->json($crawlers);
    }

    function addNew(CrawlerModel $crlModel, Request $request) {

        Validator::make($request->all(), $this->rules, $this->message)->validate();
        if (!filter_var($request['website_url'], FILTER_VALIDATE_URL)) {
            return response()->json(array('website_url' => ['Đường dẫn website không hợp lệ']), 422);
        }
        $websiteId = $crlModel::insertGetId([
                    'website_name' => $request['website_name'],
                    'website_url' => $request['website_url'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($websiteId)
            return response()->json($crlModel::find($websiteId));
        else {
            return response()->json(array('status' => FALSE));
        }
    }

    function edit(CrawlerModel $crlModel, Request $request) {

        Validator::make($request->all(), $this->rules, $this->message)->validate();
        if (!filter_var($request['website_url'], FILTER_VALIDATE_URL)) {
            return response()->json(array('website_url' => ['Đường dẫn website không hợp lệ']), 422);
        }

        $website = $crlModel::findOrFail($request->id);
        $website->website_name = $request->website_name;
        $website->website_url = $request->website_url;
        $website->updated_at = date('Y-m-d H:i:s');
        $website->save();
        return response()->json($website);
    }

    function publish(CrawlerModel $crlModel, Request $request) {
        $count = $crlModel::where([
                        ['id', '=', $request->id]
                ])->count();
        if ($count != 1) {
            return response()->json('Xả ra lỗi, đối tượng lựa chọn không hợp lệ!' . $request->id, 422);
        }
        $website = $crlModel::findOrFail($request->id);
        $website->deleted = 0;
        $website->updated_at = date('Y-m-d H:i:s');
        $website->deleted_at = null;
        $website->save();
        return response()->json($website);
    }

    function delete(CrawlerModel $crlModel, Request $request) {
        $count = $crlModel::where([
                        ['id', '=', $request->id]
                ])->count();
        if ($count != 1) {
            return response()->json('Xả ra lỗi, đối tượng lựa chọn không hợp lệ!' . $request->id, 422);
        }
        $website = $crlModel::findOrFail($request->id);
        $website->deleted = 1;
        $website->deleted_at = date('Y-m-d H:i:s');
        $resp = $website->save();
        if (!$resp) {
            return response()->json('Thao tác thất bại, Bạn vui lòng tải lại trang sau đó thao tác lại!', 422);
        }
        return response()->json($crlModel::find($request->id));
    }

}
