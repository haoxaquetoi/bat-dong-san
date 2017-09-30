<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Libs\Config;

use App\Models\Backend\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

/**
 * Cấu hình các tham số cho chức năng lọc tìm kiếm
 */
class ParamsSearchConfig {

    private $_arrParams = array(
        'category' => [],
        'city' => [],
        'district' => [],
        'village' => [],
        'direction' => [],
        'priceMin' => [],
        'priceMax' => [],
        'floorAreaMin' => [],
        'floorAreaMax' => [],
        'roomNumber' => [],
        'storeysNumber' => [],
        'street' => []
    );

    function getParamsSearch($city_active, $district_active, $village_active) {
        return $this->_getParamsSearch($city_active, $district_active, $village_active)
                ->_arrParams;
    }

    private function _getParamsSearch($city_active, $district_active, $village_active) {
        return $this->getCategory()
                        ->getCity()
                        ->getDistrict($city_active)
                        ->getVillage($district_active)
                        ->getDirection()
                        ->getFllorAreaMax()
                        ->getFllorAreaMin()
                        ->getPriceMax()
                        ->getPriceMin()
                        ->getRoomNumber()
                        ->getStoreysNumber()
                        ->getStreet($village_active);
    }

    /**
     * Chỉ lấy danh sách chuyên mục tin bất động sản
     * @param array $category Nếu count = 0 => tự động load toàn bộ danh sách chuyên mục tin bất động sản
     */
    function getCategory(array $category = []) {
        if (count($category) > 0) {
            $this->_arrParams['category'] = $category;
        } else {
            $catModel = new CategoryModel();
            $this->_arrParams['category'] = $catModel->getAllCat(0, 'Product');
        }
        return $this;
    }

    function getCity() {
        $this->_arrParams['city'] = DB::table('address_city')
                ->get()
                ->toArray();
        return $this;
    }

    function getDistrict($city_active) {

        $this->_arrParams['district'] = [];
        if (!is_null($city_active)) {
            $this->_arrParams['district'] = DB::table('address_district')->where('city_id', $city_active)->get()->toArray();
        }
        return $this;
    }

    function getVillage($district_id) {
        $this->_arrParams['village'] = [];
        if (!is_null($district_id)) {
            $this->_arrParams['village'] = DB::table('address_village')->where('district_id', $district_id)->get()->toArray();
        }
        return $this;
    }

    function getStreet($village_id) {
        $this->_arrParams['street'] = [];
        if (!is_null($village_id)) {
            $this->_arrParams['street'] = DB::table('address_street')->where('village_id', $village_id)->get()->toArray();
        }
        return $this;
    }

    function getDirection(array $direction = []) {
        if (count($direction) > 0) {
            $this->_arrParams['direction'] = $direction;
        } else {
            $this->_arrParams['direction'] = app('DirectionConfig')->getDirection();
        }
        return $this;
    }

    function getPriceMin(array $priceMin = []) {
        if (count($priceMin) > 0) {
            $this->_arrParams['priceMin'] = $priceMin;
        } else {
            $this->_arrParams['priceMin'] = [
                'NULL' => 'Thỏa thuận',
                '100000' => '1 Triệu',
                '500000' => '5 Triệu',
                '1000000' => '10 Triệu',
                '1000000000' => '1 tỉ',
                '10000000000' => '10 tỉ',
            ];
        }
        return $this;
    }

    function getPriceMax(array $priceMax = []) {
        if (count($priceMax) > 0) {
            $this->_arrParams['priceMax'] = $priceMax;
        } else {
            $this->_arrParams['priceMax'] = [
                'NULL' => 'Thỏa thuận',
                '100000' => '1 Triệu',
                '500000' => '5 Triệu',
                '1000000' => '10 Triệu',
                '1000000000' => '1 tỉ',
                '10000000000' => '10 tỉ',
            ];
        }
        return $this;
    }

    function getFllorAreaMin(array $floorAreaMin = []) {
        if (count($floorAreaMin) > 0) {
            $this->_arrParams['floorAreaMin'] = $floorAreaMin;
        } else {
            $this->_arrParams['floorAreaMin'] = DB::table('article_other')->where('floor_area', '>', 0)->select('floor_area')->groupBy('floor_area')->get()->toArray();
        }
        return $this;
    }

    function getFllorAreaMax(array $floorAreaMax = []) {
        if (count($floorAreaMax) > 0) {
            $this->_arrParams['floorAreaMax'] = $floorAreaMax;
        } else {
            $this->_arrParams['floorAreaMax'] = DB::table('article_other')->where('floor_area', '>', 0)->select('floor_area')->groupBy('floor_area')->get()->toArray();
        }
        return $this;
    }

    function getRoomNumber(array $roomNumber = []) {
        if (count($roomNumber) > 0) {
            $this->_arrParams['roomNumber'] = $roomNumber;
        } else {
            $this->_arrParams['roomNumber'] = DB::table('article_other')->where('number_of_bedrooms', '>', 0)->select('number_of_bedrooms')->groupBy('number_of_bedrooms')->get()->toArray();
        }
        return $this;
    }

    function getStoreysNumber(array $roomNumber = []) {
        if (count($roomNumber) > 0) {
            $this->_arrParams['storeysNumber'] = $roomNumber;
        } else {
            $this->_arrParams['storeysNumber'] = DB::table('article_other')->where('number_of_storeys', '>', 0)->select('number_of_storeys')->groupBy('number_of_storeys')->get()->toArray();
        }
        return $this;
    }

}
