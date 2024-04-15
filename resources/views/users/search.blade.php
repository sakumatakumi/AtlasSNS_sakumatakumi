@extends('layouts.login')

@section('content')
{{ Form::open(['route' => 'search']) }}
<div class="search">
  <input type="search" name="search" placeholder="ユーザー名">
  <button type="submit">
    <img src="images/search.png" alt="検索" class="search__btn">
  </button>
</div>
{!! Form::close() !!}

@if(!empty($searchWord))
<div class=search__word>
  検索ワード：{{$searchWord}}
</div>
@endif

@foreach ($users as $user)
<div class="user__list">
  @if($user->images == "icon1.png")
  <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="icon">
  @else
  <img src="{{asset('storage/profileImages/' . $user->images)}}" alt="User Icon" class="icon">
  @endif
  <p class="posted__name">{{ $user->username }}</p>

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
</div>
@endforeach

@endsection
