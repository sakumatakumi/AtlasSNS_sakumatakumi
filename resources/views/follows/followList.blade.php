@extends('layouts.login')

@section('content')

<div class="followlist">
  <div class="followlist__titil">
    <h2>フォローリスト</h2>
  </div>
  <div class="followlist__user">
    @foreach ($followingUsers as $user)
    @if($user->images == "icon1.png")
    <form action="{{ route('other.profile', ['id' => $user]) }}" method="post">
      @csrf
      <button type="submit" class="followlist__btn" name="otherProfileIds">
        <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="icon">
      </button>
    </form>
    @else
    <form action="{{ route('other.profile', ['id' => $user]) }}" method="post">
      @csrf
      <button type="submit" class="followlist__btn" name="otherProfileIds">
        <img src="{{ asset('storage/profileImages/' . $user->images) }}" alt="User Icon" class="icon">
      </button>
    </form>
    @endif
    @endforeach
  </div>
</div>

@foreach($followingPosts as $post)
<!-- 繰り返し（foreach））php読み返し -->
<div class="posted">
  <div class="posted__icon">
    @if($post->user->images == "icon1.png")
    <form action="{{ route('other.profile', ['id' => $post->user_id]) }}" method="post">
      @csrf
      <button type="submit" class="followlist__btn" name="otherProfileIds">
        <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="icon">
      </button>
    </form>
    @else
    <form action="{{ route('other.profile', ['id' => $post->user_id]) }}" method="post">
      @csrf
      <button type="submit" class="followlist__btn" name="otherProfileIds">
        <img src="{{asset('storage/profileImages/' . $post->user->images)}}" alt="User Icon" class="icon">
      </button>
    </form>
    @endif
  </div>
  <div class="posted__text">
    <div class="posted__name">
      <p>{{ $post->user->username }}</p>
    </div>
    <div class="posted__post">
      <!--改行有りのタグ-->
      <p>{{ $post->post }}</p>
    </div>
  </div>
  <div class="posted__item">
    <div class="posted__time">
      <p>{{ $post->created_at_formatted }}</p>
    </div>
  </div>
</div>
@endforeach

@endsection
