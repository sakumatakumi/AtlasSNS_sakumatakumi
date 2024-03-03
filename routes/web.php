<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Route::group(
  ['middleware' => 'auth'],
  function () {
    Route::get('/top', 'PostsController@index');
    Route::post('/top', 'PostsController@posts')->name('posts');

    // 編集用ルーティング
    Route::post('/posts/update', 'PostsController@update')->name('posts.update');

    Route::post('/posts/{id}/delete', 'PostsController@delete')->name('posts.delete');

    Route::get('/profile', 'UsersController@profile');
    //プロフィールアップデート
    Route::post('/profile/update', 'UsersController@update')->name('profile.update');

    Route::get('/search', 'UsersController@search')->name('search');

    Route::post('/follow/{user_id_to_follow}', 'FollowsController@followUser')->name('follow');
    Route::post('/unfollow/{user_id_to_unfollow}', 'FollowsController@unfollowUser')->name('unfollow');

    Route::get('/follow-list', 'FollowsController@followList');

    Route::get('/follower-list', 'FollowsController@followerList');

    Route::get('/other-profile/{id}', 'UsersController@otherProfile')->name('other.profile.get');
    Route::post('/other-profile/{id}', 'UsersController@otherProfile')->name('other.profile');

    //ログアウト用のルーティング
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    //Route::post('/logout', 'Auth\LoginController@logout');
  }
);
