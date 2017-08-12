<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Libs\Config;
use App\Models\Backend\CategoryModel;
use Illuminate\Support\Facades\DB;

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
        'priceFloorAreaMin' => [],
        'priceFloorAreaMax' => [],
        'roomNumber' => []
    );

    function getParamsSearch() {
        return $this->_setParamsSearch()
                ->_arrParams;
    }

    private function _setParamsSearch() {
        return $this->setCategory()
                        ->setCity()
                        ->setDistrict()
                        ->setVillage()
                        ->setDirection()
                        ->setFllorAreaMax()
                        ->setFllorAreaMin()
                        ->setPriceMax()
                        ->setPriceMin()
                        ->setRoomNumber();
    }

    /**
     * Chỉ lấy danh sách chuyên mục tin bất động sản
     * @param array $category Nếu count = 0 => tự động load toàn bộ danh sách chuyên mục tin bất động sản
     */
    function setCategory(array $category = []) {
        if (count($category) > 0) {
            $this->_arrParams['category'] = $category;
        } else {
            $catModel = new CategoryModel();
            $this->_arrParams['category'] = $catModel->getAllCat(0, 'Product');
        }
        return $this;
    }

    function setCity(array $city = []) {
        if (count($city) > 0) {
            $this->_arrParams['city'] = $city;
        } else {
            $this->_arrParams['city'] = DB::table('address_city')
                    ->get()
                    ->toArray();
        }
        return $this;
    }

    function setDistrict(array $district = []) {
        if (count($district) > 0) {
            $this->_arrParams['district'] = $city;
        } else {
            $this->_arrParams['district'] = DB::table('address_district')->get()->toArray();
        }
        return $this;
    }

    function setVillage(array $village = []) {
        if (count($village) > 0) {
            $this->_arrParams['village'] = $village;
        } else {
            $this->_arrParams['village'] = DB::table('address_village')->get()->toArray();
        }
        return $this;
    }

    function setDirection(array $direction = []) {
        if (count($direction) > 0) {
            $this->_arrParams['direction'] = $direction;
        } else {
            $this->_arrParams['direction'] = app('DirectionConfig')->getDirection();
        }
        return $this;
    }

    function setPriceMin(array $priceMin = []) {
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

    function setPriceMax(array $priceMax = []) {
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

    function setFllorAreaMin(array $priceFloorAreaMin = []) {
        if (count($priceFloorAreaMin) > 0) {
            $this->_arrParams['priceFloorAreaMin'] = $priceFloorAreaMin;
        } else {
            $this->_arrParams['priceFloorAreaMin'] = DB::table('article_other')->where('floor_area', '>', 0)->select('floor_area')->groupBy('floor_area')->get()->toArray();
        }
        return $this;
    }

    function setFllorAreaMax(array $priceFloorAreaMax = []) {
        if (count($priceFloorAreaMax) > 0) {
            $this->_arrParams['priceFloorAreaMax'] = $priceFloorAreaMax;
        } else {
            $this->_arrParams['priceFloorAreaMax'] = DB::table('article_other')->where('floor_area', '>', 0)->select('floor_area')->groupBy('floor_area')->get()->toArray();
        }
        return $this;
    }

    function setRoomNumber(array $roomNumber = []) {
        if (count($roomNumber) > 0) {
            $this->_arrParams['roomNumber'] = $roomNumber;
        } else {
            $this->_arrParams['roomNumber'] = DB::table('article_other')->where('number_of_bedrooms', '>', 0)->select('number_of_bedrooms')->groupBy('number_of_bedrooms')->get()->toArray();
        }
        return $this;
    }

}