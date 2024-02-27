@extends('layouts.login')

@section('content')
<div class="posts">
  {{ Form::open(['route' => 'posts']) }}
  <img src="{{ asset('storage/profileImages/' . Auth::user()->images) }}" alt="User Icon" class="posts__icon">
  {{ Form::textarea('post', null,['required', 'class' => 'posts__text', 'placeholder' => '投稿内容を入力してください。'])}}
  <input type="submit" class="posts__btn" name="posts__btn">
  {!! Form::close() !!}
</div>

@foreach ($posts as $post)
<!-- 繰り返し（foreach））php読み返し -->
<div class="posted">
  <!-- もし、icon.png文字列の時、デフォルト画像を出す。 -->

  <!-- それ以外は下記表示。 -->
  @if($post->user->images == "icon1.png")
  <img src="images/icon1.png" alt="User Icon" class="posted__icon">
  @else
  <img src="{{asset('storage/profileImages/' . $post->user->images)}}" alt="User Icon" class="posted__icon">
  @endif
  <p class="posted__name">{{ $post->user->username }}</p>
  <!--改行有りのタグ-->
  <p class="posted__post">{{ $post->post }}</p>
  <p class="posted__time">{{ $post->updated_at }}</p>
  <!-- ユーザーだけ表示 if文で区分してあげる。自分とその他。 -->
  @if($post->user_id == Auth::id())
  <div class="posted__edit">
    <a class="js-modal-open" href="#
" post="{{$post->post}}" post_id="{{$post->id}}">
      <img src="images/edit.png" alt="編集" class="edit--btn">
    </a>
  </div>
  <!-- ホバーしたとき切り替わる -->
  <button type="submit" class="posted__trash" name="posted__trash">
    <img src="images/trash.png" alt="削除" class="posts__icon icon--trash"></button>
  <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post">
    @csrf
    <button type="submit" class="posted__trash2" name="posted__trash2" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
      <img src="images/trash-h.png" alt="削除ホバー" class="posts__icon icon--trash2"></button>
  </form>
  @endif
</div>
@endforeach

<!-- モーダル中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="{{ route('posts.update') }}" method="post">
      @csrf
      <textarea name="modal_post" class="modal_post"></textarea>
      <input type="hidden" name="modal_id" class="modal_id">
      <button type="submit">
        <img src="images/edit.png" alt="編集" class="edit--btn">
      </button>
    </form>
  </div>
</div>

@endsection
