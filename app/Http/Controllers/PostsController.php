<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        $post = Post::get();  //postsテーブルから情報取得。手直し必要。where
        return view('posts.index', ['posts' => $post]);
    }

    public function posts(Request $request)
    {
        // バリデーション設定
        $request->validate([
            'post' => 'required|max:150'
        ]);

        $post = $request->input('post');

        //ログイン中のユーザーID取得
        $userId = auth()->user()->id;

        //ログイン中のユーザーIDを指定して投稿作成。
        Post::create([
            'post' => $post,
            'user_id' => $userId
        ]);
        return back();
    }
}
