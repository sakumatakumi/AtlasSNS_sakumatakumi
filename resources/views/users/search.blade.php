@extends('layouts.login')

@section('content')
{{ Form::open(['route' => 'search']) }}
<div class="search">
  <div class="serch__window">
    <input type="search" name="search" placeholder="ユーザー名">
  </div>
  <div class="serch__item">
    <button type="submit">
      <img src="images/search.png" alt="検索" class="search__btn">
    </button>
  </div>
  {!! Form::close() !!}
  <div class=search__word>
    @if(!empty($searchWord)) <p>検索ワード：{{$searchWord}}</p>
    @endif
  </div>
</div>

@foreach ($users as $user)
<div class="search__list">
  <div class="search__list--item">
    <div class="item--user">
      @if($user->images == "icon1.png")
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="icon">
      @else
      <img src="{{asset('storage/profileImages/' . $user->images)}}" alt="User Icon" class="icon">
      @endif
      <p>{{ $user->username }}</p>
    </div>

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
@endforeach

@endsection
