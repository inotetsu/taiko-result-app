<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" type="text/css">

    <!--フォント読み込み-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">

  </head>
  <body>
    <!--ヘッダー-->
    <div class="head">
        <div class="titleDiv">
            <span class="titleName">音ゲーリザルト記録!</span>
        </div>
        <div class="menu">
        </div>
    </div>

    <!--エラーメッセージ-->
     @if($errors->any())
        <div class="error">
            <p class="error_mess">
                入力ミスがあります(ユーザーネーム15文字以下・パスワード5文字以上)
            </p>
        </div>
     @endif

    <!--ボディー-->
    <form action="{{ route('register.store') }}" method="POST">
    @csrf
        <div class="width100">
            <div class="formBox">
                <p class="fontSize40 marginTop30">新規登録</p>
                <div class="marginTop30 widthMax paddingOpt">
                    <span class="fontSize30">ユーザーネーム : </spam><br><input type="text" name="name" class="name">
                </div>
                <div class="marginTop30 widthMax paddingOpt">
                    <span class="fontSize30">メールアドレス : </spam><br><input type="email" name="email" class="email">
                </div>
                <div class="marginTop30 widthMax paddingOpt">
                    <span class="fontSize30">パスワード : </spam><br><input type="password" name="password" class="pass">
                </div>
                <div class="marginTop30 widthMax paddingOpt">
                    <span class="fontSize30">パスワード(確認用) : </spam><br><input type="password" name="password_confirmation" class="pass_co">
                </div>
                <div class="marginTop30">
                    <button type="submit" class="btn btn-warning width150 height50">ログイン</button>
                </div>
                <div class="marginTop30">
                    <p>
                        <a href="{{ route('login') }}">ログインページへもどる</a>
                    </p>
                </div>
                </div>
            </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>