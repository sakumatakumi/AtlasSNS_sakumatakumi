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
  <div class="profile__item">
    <div class="profile__icon">
      @if(Auth::user()->images == "icon1.png")
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="icon">
      @else
      <img src="{{asset('storage/profileImages/' . Auth::user()->images)}}" alt="User Icon" class="icon">
      @endif
    </div>
    <div class="profile__edit">
      <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!--フォームエリア-->
        <ul class="edit--item">
          <li>
            <label for="name">ユーザー名</label>
            <input type="text" name="editName" value="{{ Auth::user()->username }}">
          </li>

          <li>
            <label for="email">メールアドレス</label>
            <input type="text" name="editMail" value="{{ Auth::user()->mail }}">
          </li>

          <li>
            <label for="password">パスワード</label>
            <input type="password" name="editPassword" value="">
          </li>

          <li>
            <label for="passwordConfirmation">パスワード確認</label>
            <!-- name="editPassword_confirmation"この書き方じゃないと、バリデーションの|confirmed'にひっかからない -->
            <input type="password" name="editPassword_confirmation" value="">
          </li>

          <li>
            <label for="bio">自己紹介</label>
            <textarea name="editBio">{{ Auth::user()->bio }}</textarea>
          </li>

          <li>
            <label for="images">アイコン画像</label>
            <div class="editImages"><input type="file" name="editImages"></div>
          </li>
        </ul>
    </div>
  </div>

  <div class="profile__btn">
    <input class="send-button" type="submit" value="更新">
  </div>
</div>
</form>

@endsection
