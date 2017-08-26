<?php

namespace App\Http\Controllers\Frontend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\ArticleMode;

class ArticleCtrl extends Controller {

    /**
     * Cập nhật danh sách tin bài quan tâm
     * @param Request artID: mã tin bài
     */
    public function updateListCare(Request $request) {
        $data = array();
        $list_id_care = array();

        if (isset($_COOKIE['list_id_care'])) {
            $list_id_care = json_decode($_COOKIE['list_id_care'], true);
        }
        $index = array_search($request->artID, $list_id_care);
        if ($index !== FALSE) {
            unset($list_id_care[$index]);
            $data['status'] = 'uncare';
        } else {
            $list_id_care[] = $request->artID;
            $data['status'] = 'care';
        }
        setcookie("list_id_care", json_encode($list_id_care), time() + 60 * 60 * 24 * 365, '/');
        $data['data'] = $list_id_care;
        echo json_encode($data);
    }

    /**
     * Danh sách quan tâm
     * 
     */
    public function getAllArticleCare(ArticleMode $articleModel, Request $request) {
        // tin quan tâm
        $data = array();
        if (isset($_COOKIE['list_id_care'])) {
            $list_id_care = json_decode($_COOKIE['list_id_care'], true);
            foreach ($list_id_care as $id) {
                if(count($data) == 6){
                    break;
                }
                if ($request->artID != $id) {
                    $article = $articleModel->getArticleInfo($id);
                    if (isset($article->id)) {
                        $data[] = $article;
                    }
                }
            }
        }
        echo json_encode($data);
    }

    /**
     * Kiểm tra tin bài đã quan tâm hay chưa
     * @param artID mã tin bài
     */
    public function checkArticleCare(Request $request) {
        $data = array();
        $list_id_care = array();

        if (isset($_COOKIE['list_id_care'])) {
            $list_id_care = json_decode($_COOKIE['list_id_care'], true);
        }
        $index = array_search($request->artID, $list_id_care);
        if ($index !== FALSE) {
            $data['status'] = 'care';
        } else {
            $data['status'] = 'uncare';
        }
        echo json_encode($data);
    }

}
