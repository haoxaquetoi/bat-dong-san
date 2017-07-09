<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function filterFreeText($text) {
        if (strlen($text) > 0) {
            return $this->whereRaw("name like '%$text%' OR email like '%$text%'");
        }

        return $this->whereRaw('1>0');
    }
    
    function group($userId){
        return $this->belongsToMany('App\Models\Backend\GroupModel', 'group_user', 'user_id', 'group_id')->wherePivot('user_id', $userId);
    }
}
