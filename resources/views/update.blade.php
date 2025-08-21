<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <!--フォント読み込み-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">

  </head>
  <body>
    <!--ヘッダー-->
    <div class="head">
        <div class="titleDiv">
            <a href="{{ route('home') }}" class="homeLinkA black"><span class="titleName">音ゲーリザルト記録!</span></a>
        </div>
        <div class="menu">
            <div class="marginRight20">
                {{ $user->name }}でログイン中
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-primary">ログアウト</button>
            </form>
        </div>
    </div>

    <?php
        $selectedDif = old('difficulty_id',$song->difficulty_id);
        $selectedGenre = old('genre_id',$song->genre_id);
    ?>

    <!--ボディー-->
    <form action="{{ route('song.update',['song'=>$song->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="body">
        <div class="inBody">
            <div class="inInBody div1">
                <div>
                    <span class="addSongs">曲を追加してね！</span>
                </div>
            </div>
            <div class="inInBody">
                <div class="inInBody div2">
                    <input type="text" class="addSongBtn" name="title" value="{{ old('title',$song->title) }}">
                </div>
            </div>
            <div class="inInBody">
                <div class="inInBody div3 space">
                    <select name="difficulty_id" class="difBtn">
                        <option value="1" {{$selectedDif=='1' ? 'selected' : '' }}>裏</option>
                        <option value="2" {{$selectedDif=='2' ? 'selected' : '' }}>おに</option>
                        <option value="3" {{$selectedDif=='3' ? 'selected' : '' }}>むずかしい</option>
                        <option value="4" {{$selectedDif=='4' ? 'selected' : '' }}>ふつう</option>
                        <option value="5" {{$selectedDif=='5' ? 'selected' : '' }}>かんたん</option>
                    </select>
                    <select name="genre_id" class="genre">
                        <option value="1" {{$selectedGenre=='1' ? 'selected' : '' }}>ナムコオリジナル</option>
                        <option value="2" {{$selectedGenre=='2' ? 'selected' : '' }}>ゲームミュージック</option>
                        <option value="3" {{$selectedGenre=='3' ? 'selected' : '' }}>ポップス</option>
                        <option value="4" {{$selectedGenre=='4' ? 'selected' : '' }}>クラシック</option>
                        <option value="5" {{$selectedGenre=='5' ? 'selected' : '' }}>アニメ</option>
                        <option value="6" {{$selectedGenre=='6' ? 'selected' : '' }}>ボーカロイド</option>
                        <option value="7" {{$selectedGenre=='7' ? 'selected' : '' }}>バラエティ</option>
                    </select>
                </div>
            </div>
            <div class="inInBody addBtnOpt">
                <button type="submit" class="btn btn-warning addBtn">追加 !</button>
            </div>
        </div>
    </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>