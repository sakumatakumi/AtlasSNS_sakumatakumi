<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostsController extends Controller
{
    public function index()
    {
        $post = Post::with('user')->get();  //with()の中はモデルの中で宣言したメソッド。
        // dd($post);
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

    public function update(Request $request)
    {
        dd($request);
        $post_id = $request->input('modal_id');
        $post = Post::findOrFail($post_id);
        $newPostContent = $request->modal_post;
        $post->post = $newPostContent;
        $post->save();
        return redirect()->back();
    }
}
