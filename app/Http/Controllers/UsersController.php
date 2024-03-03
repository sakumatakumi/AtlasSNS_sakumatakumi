<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'editName' => 'required|min:2|max:12',
            // 自分を除くユニークにしたい。ユニーク→１個のみ（かぶりなし）
            'editMail' => ['required', Rule::unique('users', 'mail')->ignore(Auth::id()), 'min:5', 'max:40', 'email'],
            'editPassword' => 'required|min:8|max:20|alpha_dash|confirmed',
            'bio' => 'nullable|max:150',
            'images' => 'nullable|image|mimes:jpg,png,bmp,gif,svg',
        ]);

        $user = Auth::user();
        $user->username = $request->input('editName');
        $user->mail = $request->input('editMail');
        //再確認
        $user->bio = $request->input('editBio');

        //画像保存先の確認
        //ディレクトリ名
        if ($request->hasFile('editImages')) {
            $dir = "profileImages";
            //アップロードされたファイル名を取得
            $file_name = $request->file('editImages')->getClientOriginalName();
            //指定したディレクトリに画像を保存
            $request->file('editImages')->storeAs('public/' . $dir, $file_name);

            //画像ファイル情報をDBに保存
            $user->images = $file_name;
        }

        $user->save();
        return redirect()->route('posts');
    }



    public function search(Request $request)
    {
        $search = $request->input('search');
        $loggedInUser = auth()->id();

        $query = User::query();

        if ($search) {
            $query->where('username', 'like', '%' . $search . '%');
        }

        if ($loggedInUser) {
            $query->where('id', '!=', $loggedInUser);
        }

        $users = $query->get();
        return view('users.search', ['users' => $users], ['searchWord' => $search]);
    }



    public function otherProfile($id)
    {
        $user = User::findOrFail($id);
        $post = Post::where('user_id', $id)->with('user')->get();
        //with()の中はモデルの中で宣言したメソッド。
        // dd($post);
        return view('users.otherProfile', ['user' => $user, 'post' => $post]);
    }
}
