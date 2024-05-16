@eotherProfile__userxtends('layouts.login')

@section('content')

<div class="otherProfile">
  <div class="">
    <div class="otherProfile__img">
      @if($user->images == "icon1.png")
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="posted__icon">
      @else
      <img src="{{asset('storage/profileImages/' . $user->images)}}" alt="User Icon" class="posted__icon">
      @endif
    </div>
    <ul class="otherProfile--item">
      <li>
        <p>ユーザー名</p>
        <p>{{ $user->username }}</p>
      </li>
      <li>
        <p>自己紹介</p>
        <p>{{ $user->bio }}</p>
      </li>
    </ul>
  </div>
  <div class="otherProfile__btn">
    @if(auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', $user->id) }}" method="POST">
      @csrf
      <div id="unfollow--btn">
        <input type="hidden" name="user_id_to_unfollow" value="{{ $user->id }}">
        <button type="submit">
          フォロー解除
        </button>
      </div>
    </form>
    @else
    <form action="{{ route('follow', $user->id) }}" method="POST">
      @csrf
      <div id="follow--btn">
        <input type="hidden" name="user_id_to_follow" value="{{ $user->id }}">
        <button type="submit">
          フォローする
        </button>
      </div>
    </form>
    @endif
  </div>
</div>

@foreach ($post as $post)
<div class="posted">
  <div class="posted__icon">
    @if($post->user->images == "icon1.png")
    <img src="{{asset('images/icon1.png')}}" alt="User Icon" class="posted__icon" class="icon">
    @else
    <img src="{{asset('storage/profileImages/' . $post->user->images)}}" alt="User Icon" class="posted__icon" class="icon">
    @endif
  </div>
  <div class="posted__text">
    <div class="posted__name">
      <p class="posted__name">{{ $post->user->username }}</p>
    </div>
    <div class="posted__post">
      <!--改行有りのタグ-->
      <p class="posted__post">{{ $post->post }}</p>
    </div>
  </div>
  <div class="posted__item">
    <div class="posted__time">
      <p class="posted__time">{{ $post->created_at }}</p>
    </div>
  </div>
</div>
@endforeach




@endsection
