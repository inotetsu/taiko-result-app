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
            <span class="titleName">音ゲーリザルト記録!</span>
        </div>
        <div class="menu">
            <div class="marginRight20 font12">
                {{ $user->name }}でログイン中
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-primary width40">ログアウト</button>
            </form>
        </div>
    </div>

    <!--エラーメッセージ-->
     @if($errors->any())
        <div class="error">
            <p class="error_mess">曲名を入力してください</p>
        </div>
     @endif

    <!--ボディー-->
    <form action="/home/song-add" method="POST">
    @csrf
    <div class="body">
        <div class="inBody">
            <div class="inInBody div1">
                <div>
                    <span class="addSongs">曲を追加してね！</span>
                </div>
            </div>
            <div class="inInBody">
                <div class="inInBody div2">
                    <input type="text" class="addSongBtn" name="title">
                </div>
            </div>
            <div class="inInBody">
                <div class="inInBody div3 space">
                    <select name="difficulty_id" class="difBtn">
                        <option value="1">裏</option>
                        <option value="2">おに</option>
                        <option value="3">むずかしい</option>
                        <option value="4">ふつう</option>
                        <option value="5">かんたん</option>
                    </select>
                    <select name="genre_id" class="genre">
                        <option value="1">オリジナル</option>
                        <option value="2">ゲームミュージック</option>
                        <option value="3">ポップス</option>
                        <option value="4">クラシック</option>
                        <option value="5">アニメ</option>
                        <option value="6">ボーカロイド</option>
                        <option value="7">バラエティ</option>
                    </select>
                </div>
            </div>
            <div class="inInBody addBtnOpt">
                <button type="submit" class="btn btn-warning addBtn">追加 !</button>
            </div>
        </div>
    </div>
    </form>

    <!--曲一覧-->
    <div class="songDiv">
        <p class="selectMess">曲を選ぼう！！</p>
        <form action="{{ route('home') }}" method="GET">
            <div class="flex">
                <span class="size">曲検索 : </span><input type="text" class="serchSongs" name="keyword">
                <p class="srbtn"><button type="submit" class="btn btn-warning srBtn">検索</button></p>
            </div>
        </form>
        <!--曲一覧はじまり-->
        @foreach($songs as $song)
        <div class="viewSongs">
            <a href="{{ route('song.result',['song' => $song->id]) }}" class="link">
            <div class="linkDiv">
                <div class="inViewSongs">
                    <div class="songInfo">
                        <span class="song">{{ $song->title }}</span>
                    </div>
                    <div class="songInfo width10">
                        <span 
                            @class([
                                'song',
                                'dif',
                                'ura' => $song->difficulty_id === 1,
                                'oni' => $song->difficulty_id === 2,
                                'hard' => $song->difficulty_id === 3,
                                'normal' => $song->difficulty_id === 4,
                                'easy' => $song->difficulty_id === 5
                        ])>
                                {{ $song->difficulty->name }}
                        </span>
                    </div>
                    <div class="songInfo">
                        <span 
                                 @class([
                                    'song',
                                    'namuori' => $song->genre_id === 1,
                                    'game' => $song->genre_id === 2,
                                    'pops' => $song->genre_id === 3,
                                    'classic' => $song->genre_id === 4,
                                    'anime' => $song->genre_id === 5,
                                    'vocaloid' => $song->genre_id === 6,
                                    'variety' => $song->genre_id === 7,
                        ])>
                            {{ $song->genre->name }}
                        </span>
                    </div>
                    <div class="center">
                        <!-- ゴミ箱アイコン -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <a xlink:href="{{ route('song.destroy',['song' => $song->id]) }}" class="icon_color">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                            </a>
                        </svg>
                        <!--編集アイコン-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <a xlink:href="{{ route('song.edit',['song' => $song->id]) }}" class="icon_color">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                            </a>
                        </svg>
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endforeach

        <div class="navi">
            <div>
                {{ $songs->links() }}
            </div>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>