<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Backend\AddressCityModel;
use App\Models\Backend\AddressDistrictModel;
use App\Models\Backend\AddressVillageModel;
use App\Models\Backend\AddressStreetModel;

use Validator;

class AddressCtrl extends Controller
{
    /**
     * thuc hien insert city
     * @param Request $request
     * @return type
     */
    function insertCity(Request $request){
        
        $newId = AddressCityModel::insertGetId([
            'name' => $request->name,
            'code' => $request->code,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        
        return response()->json(['id' => $newId]);
    }
    
    /**
     * lay thong tin city
     * @param type $id
     * @return type
     */
    function infoCity($id){
        $this->_validateId('id', $id, 'city');
        $data = AddressCityModel::find($id);
        return response()->json($data);
        
    }
    
    /**
     * danh sach city
     * @param Request $request
     * @param AddressCityModel $addressCityModel
     * @return type
     */
    function listCity(Request $request, AddressCityModel $addressCityModel){
        $tmpModel = $addressCityModel
                        ->filterFreeText($request->freeText)
                        ->orderBy('name');
        if((int)$request->page > 0)
        {
            $data = $tmpModel->paginate();
        }
        else
        {
            $data = $tmpModel->get();
        }
        
        return response()->json($data);
        
    }
    
    /**
     * cap nhat city
     * @param Request $request
     * @param type $id
     * @return type
     */
    function updateCity(Request $request, $id){
        //validate
        $this->_validateId('id', $id, 'city');
        $this->_validateUpdate($request);
        
        $cityInfo = AddressCityModel::find($id);
        $cityInfo->name = $request->name;
        $cityInfo->code = $request->code;
        $cityInfo->updated_at = Date('Y-m-d H:i:s');
        $cityInfo->save();
        
        return response()->json($cityInfo);
    }
    
    /**
     * xoa city
     * @param type $id
     * @param AddressCityModel $addressCityModel
     * @return type
     */
    function deleteCity($id, AddressCityModel $addressCityModel){
        //validate
        $this->_validateId('id', $id, 'city');
        
        $cityInfo = $addressCityModel->with('district')->find($id);
        if($cityInfo->district->count() > 1)
        {
            return response()->json(['id' => 'Bạn phải xóa danh mục Quận/Huyện'], 422);
        }
        
        $status = $cityInfo->delete();
        return response()->json(['status' => $status]);
    }
    
    /**
     * them moi quan huyen
     * @param Request $request
     * @return type
     */
    function insertDistrict(Request $request){
        //validate 
        $this->_validateId('city_id', $request->city_id, 'city');
        $this->_validateUpdate($request);
        
        $newId = AddressDistrictModel::insertGetId([
            'city_id' => $request->city_id,
            'name' => $request->name,
            'code' => $request->name,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        
        return response()->json(['id' => $newId]);
    }
    
    /**
     * thong tin quan huyen
     * @param type $id
     * @return type
     */
    function infoDistrict($id){
        //validate 
        $this->_validateId('id', $id, 'district');
        
        $data = AddressDistrictModel::find($id);
        return response()->json($data);
    }
    
    /**
     * danh sach quan huyen
     * @param Request $request
     * @param AddressDistrictModel $addressDistrictModel
     * @return type
     */
    function listDistrict(Request $request, AddressDistrictModel $addressDistrictModel){
        
        $tmpModel = $addressDistrictModel
                        ->with('city')
                        ->filterFreeText($request->freeText)
                        ->orderBy('name');
        if((int)$request->page > 0)
        {
            $data = $tmpModel->paginate();
        }
        else
        {
            $data = $tmpModel->get();
        }
        return response()->json($data);
        
    }
    
    /**
     * cap nhan quan huyen
     * @param Request $request
     * @param type $id
     * @return type
     */
    function updateDistrict(Request $request, $id){
        //validate 
        $this->_validateId('id', $id, 'district');
        $this->_validateId('city_id', $request->city_id, 'city');
        $this->_validateUpdate($request);
        
        $districtInfo = AddressDistrictModel::find($id);
        $districtInfo->city_id = $request->city_id;
        $districtInfo->name = $request->name;
        $districtInfo->code = $request->code;
        $districtInfo->updated_at = Date('Y-m-d H:i:s');
        $districtInfo->save();
        
        return response()->json($districtInfo);
    }
    
    /**
     * xoa quan huyen
     * @param type $id
     * @param AddressDistrictModel $addressDistrictModel
     * @return type
     */
    function deleteDistrict($id, AddressDistrictModel $addressDistrictModel){
        //validate 
        $this->_validateId('id', $id, 'district');
        
        $districtInfo = $addressDistrictModel->with('village')->find($id);
        if($districtInfo->village->count() > 1)
        {
            return response()->json(['id' => 'Bạn phải xóa danh mục Phường/Xã'], 422);
        }
        
        $status = $districtInfo->delete();
        return response()->json(['status' => $status]);
    }
    
    /**
     * them moi phuong xa
     * @param Request $request
     * @return type
     */
    function insertVillage(Request $request){
        //validate 
        $this->_validateId('district_id', $request->district_id, 'district');
        $this->_validateUpdate($request);
        
        $newId = AddressVillageModel::insertGetId([
            'district_id' => $request->district_id,
            'name' => $request->name,
            'code' => $request->name,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        
        return response()->json(['id' => $newId]);
    }
    
    /**
     * thong tin phuong xa
     * @param type $id
     * @return type
     */
    function infoVillage($id){
        //validate 
        $this->_validateId('id', $id, 'village');
        
        $data = AddressVillageModel::find($id);
        return response()->json($data);
        
    }
    
    /**
     * danh sach phuong xa
     * @param Request $request
     * @param AddressVillageModel $addressVillageModel
     * @return type
     */
    function listVillage(Request $request, AddressVillageModel $addressVillageModel){
        
        $tmpModel = $addressVillageModel
                ->with('district')
                ->filterFreeText($request->freeText)
                ->orderBy('name');
        
        if((int)$request->page > 0)
        {
            $data = $tmpModel->paginate();
        }
        else
        {
            $data = $tmpModel->get();
        }
        
        return response()->json($data);
        
    }
    
    /**
     * cap nhat phuong xa
     * @param Request $request
     * @param type $id
     * @return type
     */
    function updateVillage(Request $request, $id){
        //validate 
        $this->_validateId('id', $id, 'village');
        $this->_validateId('district_id', $request->district_id, 'district');
        $this->_validateUpdate($request);
        
        $villageInfo = AddressVillageModel::find($id);
        $villageInfo->district_id = $request->district_id;
        $villageInfo->name = $request->name;
        $villageInfo->code = $request->code;
        $villageInfo->updated_at = Date('Y-m-d H:i:s');
        $villageInfo->save();
        
        return response()->json($villageInfo);
    }
    
    /**
     * xoa phuong xa
     * @param type $id
     * @param AddressVillageModel $addressVillageModel
     * @return type
     */
    function deleteVillage($id, AddressVillageModel $addressVillageModel){
        //validate 
        $this->_validateId('id', $id, 'village');
        
        $villageInfo = $addressVillageModel->with('street')->find($id);
        if($villageInfo->street->count() > 1)
        {
            return response()->json(['id' => 'Bạn phải xóa danh mục Đường/Phố'], 422);
        }
        
        $status = $villageInfo->delete();
        return response()->json(['status' => $status]);
        
    }
    
    
    /**
     * them moi duong pho
     * @param Request $request
     * @return type
     */
    function insertStreet(Request $request){
        //validate 
        $this->_validateId('village_id', $request->village_id, 'village');
        $this->_validateUpdate($request);
        
        $newId = AddressStreetModel::insertGetId([
            'village_id' => $request->village_id,
            'name' => $request->name,
            'code' => $request->name,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        
        return response()->json(['id' => $newId]);
    }
    /**
     * thong tin duong pho
     * @param type $id
     * @return type
     */
    function infoStreet($id){
        //validate 
        $this->_validateId('id', $id, 'street');
        
        $data = AddressStreetModel::find($id);
        return response()->json($data);
        
    }
    
    /**
     * danh sach duong pho
     * @param Request $request
     * @param AddressStreetModel $addressStreetModel
     * @return type
     */
    function listStreet(Request $request, AddressStreetModel $addressStreetModel){
        
        $tmpModel = $addressStreetModel
                ->with('village')
                ->filterFreeText($request->freeText)
                ->orderBy('name');
        if((int)$request->page > 0)
        {
            $data = $tmpModel->paginate();
        }
        else
        {
            $data = $tmpModel->get();
        }
        return response()->json($data);
        
    }
    
    /**
     * cap nhat duong pho
     * @param Request $request
     * @param type $id
     * @return type
     */
    function updateStreet(Request $request, $id){
        //validate 
        $this->_validateId('id', $id, 'street');
        $this->_validateId('village_id', $request->village_id, 'village');
        $this->_validateUpdate($request);
        
        $streetInfo = AddressStreetModel::find($id);
        $streetInfo->village_id = $request->village_id;
        $streetInfo->name = $request->name;
        $streetInfo->code = $request->code;
        $streetInfo->updated_at = Date('Y-m-d H:i:s');
        $streetInfo->save();
        
        return response()->json($streetInfo);
    }
    
    /**
     * xoa duong pho
     * @param type $id
     * @param AddressStreetModel $addressStreetModel
     * @return type
     */
    function deleteStreet($id, AddressStreetModel $addressStreetModel){
        //validate 
        $this->_validateId('id', $id, 'street');
        
        $streetInfo = $addressStreetModel->find($id);
        $status = $streetInfo->delete();
        return response()->json(['status' => $status]);
    }
    
    /**
     * check validate theo id
     * @param type $name
     * @param type $id
     * @param type $type
     */
    private function _validateId($name, $id, $type){
        $arrParam = [$name => $id];
        $arrErr = [
                    $name.".required" => "$name không được bỏ trống",
                    $name.".exists" => "$name không tồn tại",
                ];
        switch ($type)
        {
            case 'city':
                $arrCondition = [$name => 'required|exists:address_city,id'];
                break;
            case 'district':
                $arrCondition = [$name => 'required|exists:address_district,id'];
                break;
            case 'village':
                $arrCondition = [$name => 'required|exists:address_village,id'];
                break;
            case 'Street':
                $arrCondition = [$name => 'required|exists:address_street,id'];
                break;
        }
        
        Validator::make($arrParam, $arrCondition, $arrErr)->validate();
    }
    
    /**
     * thuc hien validate update
     * @param type $request
     */
    private function _validateUpdate($request){
        Validator::make(
            [
                'name' => $request->name,
                'code' => $request->code,
            ],
            [
                'name' => 'required',
                'code' => 'required'
            ],
            [
                'name.required' => 'Trường name không tồn tại',
                'code.required' => 'Trường code không tồn tại',
            ]
        )->validate();
    }
}
