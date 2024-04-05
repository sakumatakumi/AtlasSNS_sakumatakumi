@extends('layouts.login')

@section('content')
<div class="posts">
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
  <div class="posts__area">
    <div class="posts__icon">
      {{ Form::open(['route' => 'posts']) }}
      @if(Auth::user()->images == "icon1.png")
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon">
      @else
      <img src="{{asset('storage/profileImages/' . Auth::user()->images)}}" alt="User Icon">
      @endif
    </div>
    <div class="posts__from">
      <div class="posts__text">
        {{ Form::textarea('post', null,['class' => 'posts__text', 'placeholder' => '投稿内容を入力してください。'])}}
      </div>
      <!-- <div class="posts__btn"> -->
      <input type="submit" class="posts__btn" name="posts__btn">
      <!-- </div> -->
      {!! Form::close() !!}
    </div>
  </div>
</div>

@foreach ($posts as $post)
<!-- 繰り返し（foreach））php読み返し -->
<div class="posted">
  @if($post->user->images == "icon1.png")
  <img src="{{asset('images/icon1.png')}}" alt="User Icon" class="posted__icon">
  @else
  <img src="{{asset('storage/profileImages/' . $post->user->images)}}" alt="User Icon" class="posted__icon">
  @endif
  <p class="posted__name">{{ $post->user->username }}</p>
  <!--改行有りのタグ-->
  <p class="posted__post">{{ $post->post }}</p>
  <p class="posted__time">{{ $post->created_at_formatted }}</p>
  <!-- ユーザーだけ表示 if文で区分してあげる。自分とその他。 -->
  @if($post->user_id == Auth::id())
  <div class="posted__edit">
    <a class="js-modal-open" href="#" post="{{$post->post}}" post_id="{{$post->id}}">
      <img src="images/edit.png" alt="編集" class="edit--btn">
    </a>
  </div>
  <!-- ホバーしたとき切り替わる -->
  <button type="submit" class="posted__trash" name="posted__trash">
    <img src="images/trash.png" alt="削除" class="posted__trash--icon"></button>
  <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post">
    @csrf
    <button type="submit" class="posted__trash" name="posted__trash" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
      <img src="images/trash-h.png" alt="削除ホバー" class="posted__trash--icon icon-hover"></button>
  </form>
  @endif
</div>
@endforeach

<!-- モーダル中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close">
  </div>


  <div class="modal__content">
    <form action="{{ route('posts.update') }}" method="post">
      @csrf
      <textarea name="modal_post" class="modal_post" required></textarea>
      <input type="hidden" name="modal_id" class="modal_id">
      <button type="submit">
        <img src="images/edit.png" alt="編集" class="edit--btn">
      </button>
    </form>
  </div>
</div>

@endsection
