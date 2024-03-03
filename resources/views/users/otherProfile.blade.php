@extends('layouts.login')

@section('content')

<div class="otherProfile">
  @if($user->images == "icon1.png")
  <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="posted__icon">
  @else
  <img src="{{asset('storage/profileImages/' . $user->images)}}" alt="User Icon" class="posted__icon">
  @endif

  <p class="">ユーザー名</p>
  <p class="otherProfile__name">{{ $user->username }}</p>
  <p class="">自己紹介</p>
  <p class="otherProfile__bio">{{ $user->bio }}</p>

  @if(auth()->user()->isFollowing($user->id))
  <form action="{{ route('unfollow', $user->id) }}" method="POST">
    @csrf
    <input type="hidden" name="user_id_to_unfollow" value="{{ $user->id }}">
    <button type="submit" class="unfollow--btn">
      フォロー解除
    </button>
  </form>
  @else
  <form action="{{ route('follow', $user->id) }}" method="POST">
    @csrf
    <input type="hidden" name="user_id_to_follow" value="{{ $user->id }}">
    <button type="submit" class="follow--btn">
      フォローする
    </button>
  </form>
  @endif

  @foreach ($post as $post)
  @if($post->user->images == "icon1.png")
  <img src="{{asset('images/icon1.png')}}" alt="User Icon" class="posted__icon">
  @else
  <img src="{{asset('storage/profileImages/' . $post->user->images)}}" alt="User Icon" class="posted__icon">
  @endif
  <p class="posted__name">{{ $post->user->username }}</p>
  <!--改行有りのタグ-->
  <p class="posted__post">{{ $post->post }}</p>
  <p class="posted__time">{{ $post->created_at }}</p>
  @endforeach



</div>

@endsection
