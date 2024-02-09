<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'post', 'user_id'
    ];

    //1対他の関係の1のほうだから、宣言するメソッド名は単数
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
