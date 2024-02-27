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
  <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!--フォームエリア-->
    <div class="profile__edit">
      <label class="edit--text" for="name">お名前</label>
      <input type="text" name="editName" value="{{ Auth::user()->username }}" class="edit-name">
    </div>

    <div class="profile__edit">
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
      <textarea name="editBio" value="{{ Auth::user()->bio }}" class=edit--bio></textarea>
    </div>

    <div class="profile__edit">
      <label class="edit--text" for="images">アイコン画像</label>
      <input type="file" name="editImages">
    </div>
    <input class="send-button" type="submit" value="更新">
  </form>
</div>



@endsection
