<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

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
        //まずは、ログインしているuserがフォローしている人のuserIDを取得して変数へ
        $followingUserIds = Auth::user()->followings()->pluck('followed_id');

        //ポストテーブルから上記で取得したユーザーID達のポストを取得
        $followingPosts = Post::whereIn('user_id', $followingUserIds)->orderBy('created_at', 'desc')->get();

        //userテーブルから上記で取得したユーザーID達の情報を取得（アイコン、名前、時間）
        $followingUsers = User::whereIn('id', $followingUserIds)->get();

        //送りたい情報は二つあるので、二つかく
        return view('follows.followList', ['followingUsers' => $followingUsers, 'followingPosts' => $followingPosts]);
    }

    public function followerList()
    {
        //まずは、ログインしているuserがフォローしている人のuserIDを取得して変数へ
        $followerUserIds = Auth::user()->followers()->pluck('following_id');

        //ポストテーブルから上記で取得したユーザーID達のポストを取得
        $followerPosts = Post::whereIn('user_id', $followerUserIds)->orderBy('created_at', 'desc')->get();

        //userテーブルから上記で取得したユーザーID達の情報を取得（アイコン、名前、時間）
        $followerUsers = User::whereIn('id', $followerUserIds)->get();

        //送りたい情報は二つあるので、二つかく
        return view('follows.followerList', ['followerUsers' => $followerUsers, 'followerPosts' => $followerPosts]);
    }
}
