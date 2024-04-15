@extends('layouts.login')

@section('content')

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

<div class=profile>
  <div class="profile__edit">
    <div class="posts__icon">
      @if(Auth::user()->images == "icon1.png")
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="icon">
      @else
      <img src="{{asset('storage/profileImages/' . Auth::user()->images)}}" alt="User Icon" class="icon">
      @endif
      <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!--フォームエリア-->
        <label class="edit--text" for="name">お名前</label>
        <input type="text" name="editName" value="{{ Auth::user()->username }}" class="edit-name">

        <div class="profile__text">
          <label class="edit--text" for="email">メールアドレス</label>
          <input type="text" name="editMail" value="{{ Auth::user()->mail }}" class="edit-mail">
        </div>

        <div class="profile__edit">
          <label class="edit--text" for="password">パスワード</label>
          <input type="password" name="editPassword" value="" class="edit--password">
        </div>

        <div class="profile__edit">
          <label class="edit--text" for="passwordConfirmation">パスワード確認</label>
          <!-- name="editPassword_confirmation"この書き方じゃないと、バリデーションの|confirmed'にひっかからない -->
          <input type="password" name="editPassword_confirmation" value="" class="edit--passwordConfirmation">
        </div>

        <div class="profile__edit">
          <label class="edit--text" for="bio">自己紹介</label>
          <textarea name="editBio" class=edit--bio>{{ Auth::user()->bio }}</textarea>
        </div>

        <div class="profile__edit">
          <label class="edit--text" for="images">アイコン画像</label>
          <input type="file" name="editImages">
        </div>
        <input class="send-button" type="submit" value="更新">
      </form>
    </div>



    @endsection
