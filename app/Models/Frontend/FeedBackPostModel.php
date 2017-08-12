<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FeedBackPostModel extends Model {

    protected $table = 'feedback_article';
    public $timestamps = false;

    function updateFeedBack($articleID, $feedBackID) {
        $ipClient = $this->getRealIpAddr();
        //Chặn không cho gửi liên tục trong vòng 5 phút
        //Không làm vì đã có captcha
        $this::insertGetId([
            'article_id' => $articleID,
            'feedback_id' => $feedBackID,
            'readed' => 0,
            'value' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'IPClient' => $ipClient
        ]);
    }

    function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
