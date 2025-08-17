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
            <ul class="nav">
                <li>アカウント名</li>
            </ul>
        </div>
    </div>

    <!--ボディー-->
    <form action="" method="POST">
    @csrf
        <div class="width100">
            <div class="formBox">
                <p class="fontSize40 marginTop30">新規登録</p>
                <div class="marginTop30">
                    <span class="fontSize30">ユーザーネーム : </spam><input type="text">
                </div>
                <div class="marginTop30">
                    <span class="fontSize30">メールアドレス : </spam><input type="email">
                </div>
                <div class="marginTop30">
                    <span class="fontSize30">パスワード : </spam><input type="password">
                </div>
                <div class="marginTop30">
                    <button type="submit" class="btn btn-warning width150 height50">ログイン</button>
                </div>
                <div class="marginTop30 flexCenter width80">
                    <p>
                        <a href="#">新規登録はこちら</a>
                    </p>
                    <p>
                        <a href="#">ログインページへもどる</a>
                    </p>
                </div>
                </div>
            </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>