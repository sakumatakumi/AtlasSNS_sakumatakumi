<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $followingIds = auth()->user()->followings()->pluck('followed_id');

        $post = Post::with('user')
            ->whereIn('user_id', $followingIds)
            ->orWhere('user_id', $userId)
            ->orderBy('created_at', 'desc')->get();  //with()の中はモデルの中で宣言したメソッド。
        // dd($post);
        return view('posts.index', ['posts' => $post]);
    }

    public function posts(Request $request)
    {
        // バリデーション設定
        $request->validate([
            'post' => 'required|min:1|max:150'
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
        // dd($request);
        $request->validate([
            'modal_post' => 'required|min:1|max:150'
        ]);

        $post_id = $request->input('modal_id');
        $post = Post::findOrFail($post_id);
        $newPostContent = $request->modal_post;
        $post->post = $newPostContent;
        $post->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->back();
    }
}
