<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //基本的な型は第一引数は相手のモデル、第二はテーブル名、第三自分のIDが入る場所　、第四　相手のIDがはいるカラムを指定
    //省略可能な場合もあり。laravel公式なドキュメントあり
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }


    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    public function isFollowing($user_id)
    {
        return $this->followings()->where('followed_id', $user_id)->exists();
    }
}
