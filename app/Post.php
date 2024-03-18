<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d H:i');
    }
}
