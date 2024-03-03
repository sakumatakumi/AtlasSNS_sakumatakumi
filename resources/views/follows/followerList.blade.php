@extends('layouts.login')

@section('content')
<div class="followerlist">
  <h2 class="followerlist__titil">フォローワーリスト</h2>
  @foreach ($followerUsers as $user)
  @if($user->images == "icon1.png")
  <form action="{{ route('other.profile', ['id' => $user]) }}" method="post">
    @csrf
    <button type="submit" class="followerlist__btn" name="otherProfileIds">
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon">
    </button>
  </form>
  @else
  <form action="{{ route('other.profile', ['id' => $user]) }}" method="post">
    @csrf
    <button type="submit" class="followlist__btn" name="otherProfileIds">
      <img src="{{ asset('storage/profileImages/' . $user->images) }}" alt="User Icon">
    </button>
  </form>
  @endif
  @endforeach

  @foreach($followerPosts as $post)
  <!-- 繰り返し（foreach））php読み返し -->
  <div class="followlist__posted">
    @if($post->user->images == "icon1.png")
    <form action="{{ route('other.profile', ['id' => $post->user_id]) }}" method="post">
      @csrf
      <button type="submit" class="followerlist__btn" name="otherProfileIds">
        <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="posted__icon">
      </button>
    </form>
    @else
    <form action="{{ route('other.profile', ['id' => $post->user_id]) }}" method="post">
      @csrf
      <button type="submit" class="followerlist__btn" name="otherProfileIds">
        <img src="{{asset('storage/profileImages/' . $post->user->images)}}" alt="User Icon" class="posted__icon">
      </button>
    </form>
    @endif
    <p class="posted__name">{{ $post->user->username }}</p>
    <!--改行有りのタグ-->
    <p class="posted__post">{{ $post->post }}</p>
    <p class="posted__time">{{ $post->created_at }}</p>
  </div>
  @endforeach
</div>

@endsection
