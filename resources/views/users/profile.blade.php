@extends('layouts.login')

@section('content')

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

          @if ($errors->has('editName'))
          <div class="alert alert-danger">
            <li>{{$errors->first('editName')}}</li>
          </div>
          @endif

          <li>
            <label for="email">メールアドレス</label>
            <input type="text" name="editMail" value="{{ Auth::user()->mail }}">
          </li>

          @if ($errors->has('editMail'))
          <div class="alert alert-danger">
            <li>{{$errors->first('editMail')}}</li>
          </div>
          @endif


          <li>
            <label for="password">パスワード</label>
            <input type="password" name="editPassword" value="">
          </li>

          @if ($errors->has('editPassword'))
          <div class="alert alert-danger">
            <li>{{$errors->first('editPassword')}}</li>
          </div>
          @endif


          <li>
            <label for="passwordConfirmation">パスワード確認</label>
            <!-- name="editPassword_confirmation"この書き方じゃないと、バリデーションの|confirmed'にひっかからない -->
            <input type="password" name="editPassword_confirmation" value="">
          </li>

          @if ($errors->has('editPassword_confirmation'))
          <div class="alert alert-danger">
            <li>{{$errors->first('editPassword_confirmation')}}</li>
          </div>
          @endif


          <li>
            <label for="bio">自己紹介</label>
            <textarea name="editBio" cols="20" wrap="hard">{{ Auth::user()->bio }}</textarea>
          </li>

          @if ($errors->has('editBio'))
          <div class="alert alert-danger">
            <li>{{$errors->first('editBio')}}</li>
          </div>
          @endif


          <li>
            <label>アイコン画像</label>
            <div class="editImages ">
              <label for="images" class="editImages--lavel">
                <div class="editImages--text">
                  <p>ファイルを選択</p>
                </div>
              </label>
              <input type="file" name="editImages" class="editImages-box" id="images">
            </div>
          </li>

          @if ($errors->has('editImages'))
          <div class="alert alert-danger">
            <li>{{$errors->first('editImages')}}</li>
          </div>
          @endif

        </ul>
    </div>
  </div>

  <div class="profile__btn">
    <input class="send-button" type="submit" value="更新">
  </div>
</div>
</form>

@endsection
