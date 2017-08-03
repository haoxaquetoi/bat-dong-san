<?php

namespace App\Http\Controllers\Backend\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ArticleModel;
use App\Models\Backend\ArticleBaseModel;
use App\Models\Backend\AddressCityModel;
use App\Models\Backend\AddressDistrictModel;
use App\Models\Backend\AddressVillageModel;
use App\Models\Backend\AddressStreetModel;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\TagsModel;
use Illuminate\Support\Facades\DB;

class ArticleCtrl extends Controller {

    function main(ArticleModel $artModel, CategoryModel $catModel, Request $request) {
        $category = $catModel->getAllCat(0);
        $viewData['category'] = collect($category);
        $viewData['post_date'] = $artModel::select(DB::raw("DATE_FORMAT(created_at,'%m-%Y') as post_date"))->groupBy('post_date')->orderBy('post_date', 'desc')->get()->toArray();
        $viewData['count'] = [];
        $viewData['count']['total'] = $artModel::count();
        $viewData['count']['total_publish'] = $artModel::where('status', 'Publish')->count();
        $viewData['count']['total_trash'] = $artModel::where('status', 'Trash')->count();

        $viewData['arrArticle'] = $artModel::get()->toArray();

        
        return view('backend/article/listArticle', $viewData);
    }

    function singleArticleNews(ArticleModel $artModel, CategoryModel $catModel, Request $request) {
        $id = isset($request->id) ? $request->id : 0;
        $viewData['articleInfo'] = $artModel->getArticleInfo($id);

        $viewData['city'] = AddressCityModel::select('id', 'name')->get()->toArray();
        $viewData['district'] = AddressDistrictModel::select('id', 'name', 'city_id')->get()->toArray();
        $viewData['village'] = AddressVillageModel::select('id', 'name', 'district_id')->get()->toArray();
        $viewData['street'] = AddressStreetModel::select('id', 'name', 'village_id')->get()->toArray();
        $viewData['tags'] = TagsModel::select('id', 'code')->get()->toArray();
        $category = $catModel->getAllCat(0);
        $viewData['category'] = collect($category);

        return view('backend/article/singleArticleNews', $viewData);
    }

    function singleArticleProduct(ArticleModel $artModel, CategoryModel $catModel, Request $request) {

        $id = isset($request->id) ? $request->id : 0;
        $viewData['articleInfo'] = $artModel->getArticleInfo($id);

        $viewData['city'] = AddressCityModel::select('id', 'name')->get()->toArray();
        $viewData['district'] = AddressDistrictModel::select('id', 'name', 'city_id')->get()->toArray();
        $viewData['village'] = AddressVillageModel::select('id', 'name', 'district_id')->get()->toArray();
        $viewData['street'] = AddressStreetModel::select('id', 'name', 'village_id')->get()->toArray();
        $viewData['tags'] = TagsModel::select('id', 'code')->get()->toArray();
        $category = $catModel->getAllCat(0);
        $viewData['category'] = collect($category);
        return view('backend/article/singleArticleProduct', $viewData);
    }

}
