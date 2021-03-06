<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DB;

class FeedbackArticleModel extends Model {

    protected $table = 'feedback_article';
    public $timestamps = false;

    function getAll($readed = NULL, $freeText = NULL, $fbID = null, $postID = null) {
        $where = [];
        $orWhere = [];
        if (!is_null($readed)) {
            $where[] = ['feedback_article.readed', '=', $readed];
        }
        if (!is_null($freeText)) {
            $orWhere[] = ['article.title', 'like', "%$readed%"];
        }
        if (intval($fbID) > 0) {
            $orWhere[] = ['feedback_article.feedback_id', '=', "$fbID"];
        }
        if (!is_null($postID)) {
            $where[] = ['feedback_article.article_id', '=', "$postID"];
        }

        $resp = $this->where($where)
                ->orWhere($orWhere)
                ->leftJoin('article', 'article.id', '=', 'feedback_article.article_id')
                ->leftJoin('feedback', 'feedback.id', '=', 'feedback_article.feedback_id')
                ->select(DB::raw('DATE_FORMAT(feedback_article.created_at, "%d-%m-%Y") as created_at_dmY'), DB::raw('CASE  feedback_article.readed when 1 then "Đã đọc" ELSE  "Chưa đọc" end as readedText,feedback_article.*,article.title as postTitle,feedback.name as feedbackTitle '))
                ->orderBy('readed', 'asc')
                ->orderBy('id', 'desc')
                ->paginate()
                ->toArray();
        return $resp;
    }

    function getFbByPost($postID) {
        $resp['other'] = $this->where([
                    ['feedback_article.article_id', $postID],
                    ['feedback_article.feedback_id', 1]
                ])
                ->leftJoin('feedback', 'feedback.id', '=', 'feedback_article.feedback_id')
                ->select(DB::raw('DATE_FORMAT(feedback_article.created_at, "%d-%m-%Y") as created_at_dmY'), DB::raw('CASE  feedback_article.readed when 1 then "Đã đọc" ELSE  "Chưa đọc" end as readedText,feedback_article.*,feedback.name as feedbackTitle '))
                ->orderBy('readed', 'asc')
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();

        $resp['fb'] = $this->where([
                    ['feedback_article.article_id', $postID],
                    ['feedback_article.id', '!=', 1]
                ])
                ->leftJoin('feedback', 'feedback.id', '=', 'feedback_article.feedback_id')
                ->select(DB::raw('count(feedback_article.id) as total,feedback.name'))
                ->groupBy('feedback_article.feedback_id')
                ->get()
                ->toArray();
        return $resp;
    }

}
