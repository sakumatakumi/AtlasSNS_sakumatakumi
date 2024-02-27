@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<!-- まずは登録時、見えないURLに情報を送る。 -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

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

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
