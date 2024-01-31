<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'post', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
