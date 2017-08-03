<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;
use Validator;

class ArticleCtrl extends Controller {

    public function getAllArticle(ArticleMode $articleModel, Request $request) {
        
        $data = $articleModel->getAllArticle($request);
        return response()->json($data);
        
    }

}
