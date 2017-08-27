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
            'house_direction'=>'Hướng nhà',
            'number_of_wc' => 'Số phòng WC',
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
        'bds1' => ['name' => 'batdongsan.com.vn',
            'url' => 'https://batdongsan.com.vn',
            'status' => true,
            'mappAddress' => [
                'city' => [
                    'SG' =>
                    [
                        'mapp' => [
                            'code' => '1',
                            'name' => 'Hồ Chí Minh'
                        ],
                        'name' => 'Hồ Chí Minh'
                    ],
                    'HN' =>
                    [
                        'mapp' => [
                            'code' => '2',
                            'name' => 'Hà Nội'
                        ],
                        'name' => 'Hà Nội'
                    ],
                    'DDN' =>
                    [
                        'mapp' => [
                            'code' => '3',
                            'name' => 'Đà Nẵng'
                        ],
                        'name' => 'Đà Nẵng'
                    ],
                    'BD' =>
                    [
                        'mapp' => [
                            'code' => '4',
                            'name' => 'Bình Dương'
                        ],
                        'name' => 'Bình Dương'
                    ],
                    'KH' =>
                    [
                        'mapp' => [
                            'code' => '5',
                            'name' => 'Đồng Nai'
                        ],
                        'name' => 'Đồng Nai'
                    ],
                    'HN' =>
                    [
                        'mapp' => [
                            'code' => '6',
                            'name' => 'Khánh Hòa'
                        ],
                        'name' => 'Khánh Hòa'
                    ],
                    'HP' =>
                    [
                        'mapp' => [
                            'code' => '7',
                            'name' => 'Hải Phòng'
                        ],
                        'name' => 'Hải Phòng'
                    ],
                    'LA' =>
                    [
                        'mapp' => [
                            'code' => '8',
                            'name' => 'Long An'
                        ],
                        'name' => 'Long An'
                    ],
                    'QNA' =>
                    [
                        'mapp' => [
                            'code' => '9',
                            'name' => 'Quảng Nam'
                        ],
                        'name' => 'Quảng Nam'
                    ]
                ]
            ]
        ],
        'bds2' => ['name' => 'NGuồn 2',
            'url' => 'http://batdongsan.com.vn',
            'status' => true,
        ],
        'bds3' => ['name' => 'NGuồn 3',
            'url' => 'http://batdongsan.com.vn',
            'status' => true
        ]
    ];

    function getColumnConfig() {
        return $this->columnConfig;
    }

}
