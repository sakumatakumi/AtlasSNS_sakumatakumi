<div class="login_container">
  @extends('layouts.logout')

  @section('content')

  <div id="clear">
    <div class="login_clear">
      <p class="login_clear-text">
        <!-- セッションデータを受け取り -->
        {{ session('username')}}さん
      </p>
      <p class="login_clear-text">ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="login_text">
      <p class="login_text-item">ユーザー登録が完了しました。</p>
      <p class="login_text-item">早速ログインをしてみましょう。</p>
    </div>
    <p class="login_btn"><a href="/login" class="login_btn-tab">ログイン画面へ</a></p>
  </div>

  @endsection
</div>
