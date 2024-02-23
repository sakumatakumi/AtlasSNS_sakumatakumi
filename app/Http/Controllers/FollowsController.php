<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function followUser($user_id_to_follow)
    {
        $user = User::findOrFail($user_id_to_follow);
        auth()->user()->followings()->attach($user->id);
        // フォロー成功時の処理
        return redirect()->back();
    }

    public function unfollowUser($user_id_to_unfollow)
    {
        $user = User::findOrFail($user_id_to_unfollow);
        auth()->user()->followings()->detach($user->id);
        // アンフォロー成功時の処理
        return redirect()->back();
    }


    public function followList()
    {
        return view('follows.followList');
    }

    public function followerList()
    {
        return view('follows.followerList');
    }
}
