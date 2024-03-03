<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //ゲストはログアウトに逃がしたい
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd($request);
            $data = $request->only('mail', 'password');
            // ログインが成功したら、トップページへ
            if (Auth::attempt($data)) {
                // ログイン成功時にセッションにユーザー名を保存
                return redirect('/top');
            }
        }
        return view("auth.login");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('logout'));
    }
}
