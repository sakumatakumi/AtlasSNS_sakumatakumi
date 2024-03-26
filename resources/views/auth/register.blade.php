<div class="login_container">
  @extends('layouts.logout')

  @section('content')
  <!-- 適切なURLを入力してください -->
  <!-- まずは登録時、見えないURLに情報を送る。 -->
  {!! Form::open(['url' => '/register']) !!}

  <h2 class="login_text">新規ユーザー登録</h2>

  @if ($errors->any())
  <div class="alert alert-danger">
    <tr>
      <th>ERROR</th>
      @foreach ($errors->all() as $error)
      <td>{{ $error }}</td>
      @endforeach
    </tr>
  </div>
  @endif

  <div class="login_item">
    {{ Form::label('ユーザー名',null,['class' => 'label']) }}
    {{ Form::text('username',null,['class' => 'input']) }}
  </div>

  <div class="login_item">
    {{ Form::label('メールアドレス',null,['class' => 'label']) }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>

  <div class="login_item">
    {{ Form::label('パスワード',null,['class' => 'label']) }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

  <div class="login_item">
    {{ Form::label('パスワード確認',null,['class' => 'label']) }}
    {{ Form::password('password_confirmation',['class' => 'input']) }}
  </div>

  <div class='login_button'>
    {{ Form::submit('新規登録',['class' => 'button']) }}
  </div>

  <p class="tab"><a href="/login" style="color: #fff;">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}


  @endsection
</div>
