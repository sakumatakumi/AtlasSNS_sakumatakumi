@extends('layouts.login')

@section('content')
<div class="posts">
  {{ Form::open(['route' => 'posts']) }}
  <img src="images/icon1.png" alt="User Icon" class="posts__icon">
  {{ Form::textarea('post', null,['required', 'class' => 'posts__text', 'placeholder' => '投稿内容を入力してください。'])}}
  <input type="image" class="posts__btn" name="posts__btn" src="images/post.png" alt="投稿">
  {!! Form::close() !!}
</div>

<div class="posted">

</div>
@endsection
