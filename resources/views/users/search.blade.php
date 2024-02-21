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
  <img src="images/icon1.png" alt="User Icon" class="list--icon">
  <p class="posted__name">{{ $user->username }}</p>

  <form action="{{ route('follow', $user->id) }}" method="POST">
    @csrf
    <input type="hidden" name="user_id_to_follow" value="{{ $user->id }}">
    <button type="submit" class="follow--btn">
      フォローする
    </button>
  </form>

  <form action="{{ route('unfollow', $user->id) }}" method="POST">
    @csrf
    <input type="hidden" name="user_id_to_unfollow" value="{{ $user->id }}">
    <button type="submit" class="unfollow--btn">
      フォロー解除
    </button>
  </form>
</div>
@endforeach

@endsection
