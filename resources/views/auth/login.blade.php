<div class="login_container">
  @extends('layouts.logout')


  @section('content') <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login']) !!}
  <p class="login_text">AtlasSNSへようこそ</p>
  <div class="login_item">
    {{ Form::label('メールアドレス',null,['class' => 'label']) }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="login_item">
    {{ Form::label('パスワード',null,['class' => 'label']) }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>
  <div class='login_button'>
    {{ Form::submit('ログイン',['class' => 'button']) }}
  </div>
  <p class="tab"><a href="/register" style="color: #fff;">新規ユーザーの方はこちら</a></p>
  {!! Form::close() !!}

  @endsection
</div>
