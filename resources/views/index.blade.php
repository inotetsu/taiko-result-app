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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <a xlink:href="{{ route('song.destroy',['song' => $song->id]) }}">
                                <path d="M3 6h18M9 6v12m6-12v12m-9 4h12a2 2 0 002-2V6H5v14a2 2 0 002 2z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </a>
                        </svg>
                        <!--編集アイコン-->
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <a xlink:href="{{ route('song.edit',['song' => $song->id]) }}">
                                <path d="M 43.125 2 C 41.878906 2 40.636719 2.488281 39.6875 3.4375 L 38.875 4.25 L 45.75 11.125 C 45.746094 11.128906 46.5625 10.3125 46.5625 10.3125 C 48.464844 8.410156 48.460938 5.335938 46.5625 3.4375 C 45.609375 2.488281 44.371094 2 43.125 2 Z M 37.34375 6.03125 C 37.117188 6.0625 36.90625 6.175781 36.75 6.34375 L 4.3125 38.8125 C 4.183594 38.929688 4.085938 39.082031 4.03125 39.25 L 2.03125 46.75 C 1.941406 47.09375 2.042969 47.457031 2.292969 47.707031 C 2.542969 47.957031 2.90625 48.058594 3.25 47.96875 L 10.75 45.96875 C 10.917969 45.914063 11.070313 45.816406 11.1875 45.6875 L 43.65625 13.25 C 44.054688 12.863281 44.058594 12.226563 43.671875 11.828125 C 43.285156 11.429688 42.648438 11.425781 42.25 11.8125 L 9.96875 44.09375 L 5.90625 40.03125 L 38.1875 7.75 C 38.488281 7.460938 38.578125 7.011719 38.410156 6.628906 C 38.242188 6.246094 37.855469 6.007813 37.4375 6.03125 C 37.40625 6.03125 37.375 6.03125 37.34375 6.03125 Z"></path>
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