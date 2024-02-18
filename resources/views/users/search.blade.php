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
  <button type="submit" class="follow--btn">
    フォローする
  </button>
  <button type="submit" class="unfollow--btn">
    フォロー解除
  </button>
</div>
@endforeach

@endsection
