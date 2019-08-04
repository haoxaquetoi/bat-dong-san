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

}
