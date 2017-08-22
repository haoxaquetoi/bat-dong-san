<?php

namespace App\Libs\Config;

use Illuminate\Support\Facades\DB;

class SettingCrawler {

    protected $columnConfig = [
        'content' => [
            'title' => 'Tiêu đề',
            'content' => 'Mô tả',
            'begin_date' => 'Ngày đăng',
            'end_date' => 'Ngày kết thúc đăng',
            'is_sticky' => 'Tin nổi bật',
            'is_censored' => 'Tin đảm bảo',
            'is_sold' => 'Tin đã bán',
            'thumbnail' => 'Ảnh minh họa'
        ],
        'base' => [
            'city_id' => 'Tỉnh/Thành phố',
            'district_id' => 'Quận/Huyện',
            'village_id' => 'Phường/Xã',
            'street_id' => 'Đường/Phố',
            'address' => 'Địa chỉ',
            'price' => 'Giá đăng',
            'myself' => 'Chính chủ?'
        ],
        'other' => [
            'facade' => 'Mặt tiền',
            'entry_width' => 'Chiều rộng nối vào',
            'balcony_direction' => 'Hướng ban công',
            'number_of_storeys' => 'Số tầng',
            'number_of_bedrooms' => 'Số phòng',
            'furniture' => 'Nội thất',
            'floor_area' => 'Diện tích nhà'
        ],
        'contact' => [
            'name' => 'Họ tên người liên hệ',
            'address' => 'Địa chỉ liên hệ',
            'phone' => 'Số điện thoại bàn',
            'mobile' => 'Số di động',
            'email' => 'Email'
        ],
        'slide' => [
            'type' => 'Loại ảnh? [video|youtube|images]',
            'path' => 'Đường dẫn liên kết'
        ]
    ];
    public $arrWebsiteGetData = [
        ['name' => 'NGuồn 1',
            'url' => 'http://batdongsan.com.vn',
            'status' => true,
            'code' => 'bds1'
        ],
        ['name' => 'NGuồn 2',
            'url' => 'http://batdongsan.com.vn',
            'status' => true,
            'code' => 'bds2'
        ],
        ['name' => 'NGuồn 3',
            'url' => 'http://batdongsan.com.vn',
            'status' => true,
            'code' => 'bds3'
        ]
    ];

    function getColumnConfig() {
        return $this->columnConfig;
    }

}
