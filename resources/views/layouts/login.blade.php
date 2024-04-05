<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div class="header__inner">
            <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}" alt="Logo" class="header__logo"></a></h1>
            <div class="header__guide">
                <p class="header__user">{{ Auth::user()->username }}　さん</p>
                <div class="header__menu">
                    <div class="header__btn">
                        <span class="btn--open"></span>
                        <nav class="header__nav">
                            <ul>
                                <li class="nav--item"><a href="/top">HOME</a></li>
                                <li class="nav--item"><a href="/profile">プロフィール編集</a></li>
                                <li class="nav--item"><a href=" {{ route('logout') }}">ログアウト</a></li>
                            </ul>
                        </nav>
                    </div>
                    @if(Auth::user()->images == "icon1.png")
                    <img src="{{ asset('images/icon1.png') }}" alt="User Icon" class="posts__icon">
                    @else
                    <img src="{{ asset('storage/profileImages/' . Auth::user()->images) }}" alt="User Icon" class="header__icon">
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="container">
            <!-- <div class="container"> -->
            @yield('content')
        </div>
        <div class="side-bar">
            <div class="confirm">
                <p>{{ Auth::user()->username }}　さんの</p>
                <div>
                    <p>フォロー数</p>
                    <!-- 現在ログインしているユーザーがUserモデルで定義されたメソッドをの数を数えてね -->
                    <p>{{ auth()->user()->followings()->count() }}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>{{ auth()->user()->followers()->count() }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
