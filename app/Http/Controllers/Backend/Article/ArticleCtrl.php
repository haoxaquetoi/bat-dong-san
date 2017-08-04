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
        $viewData['count']['total_deleted'] = $artModel::where('deleted', '1')->count();

        $arr_where = [];
        if ($request->type) {
            $arr_where[] = ['type', '=', $request->type];
        }
        if ($request->option == 'Trash' || $request->option == 'Publish') {
            $arr_where[] = ['status', '=', $request->option];
        }
        if ($request->option == 'deleted') {
            $arr_where[] = ['deleted', '=', 1];
        }
        if ($request->freeText) {
            $arr_where[] = ['title', 'like', "%{$request->freeText}%"];
        }
        if ($request->post_date) {
            $arr_where[] = [DB::raw("DATE_FORMAT(created_at,'%m-%Y')"), '=', $request->post_date];
        }
        $artModel = $artModel::where($arr_where);
        if ($request->ord_crat) {
          
            $artModel = $artModel->orderBy('created_at', $request->ord_crat);
        }
        if ($request->ord_sk) {
            $artModel = $artModel->orderBy('is_sticky', $request->ord_sk);
        }
        if ($request->ord_cd) {
            $artModel = $artModel->orderBy('is_censored', $request->ord_cd);
        }
        $viewData['arrArticle'] = $artModel->where($arr_where)->paginate()->toArray();
        
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
        $viewData['direction'] = app('DirectionConfig')->getDirection();;
        $category = $catModel->getAllCat(0);
        $viewData['category'] = collect($category);
        return view('backend/article/singleArticleProduct', $viewData);
    }

}
