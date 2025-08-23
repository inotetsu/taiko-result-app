<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet" type="text/css">

    <!--フォント読み込み-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">

  </head>
  <body 
        @class([
            'namori_body' => $song->genre_id === 1,
            'game_body' => $song->genre_id === 2,
            'pops_body' => $song->genre_id === 3,
            'classic_body' => $song->genre_id === 4,
            'anime_body' => $song->genre_id === 5,
            'vocaloid_body' => $song->genre_id === 6,
            'variety_body' => $song->genre_id === 7,
    ])>

    <!--ヘッダー-->
    <div
            @class([
            'head',
            'namori_head' => $song->genre_id === 1,
            'game_head' => $song->genre_id === 2,
            'pops_head' => $song->genre_id === 3,
            'classic_head' => $song->genre_id === 4,
            'anime_head' => $song->genre_id === 5,
            'vocaloid_head' => $song->genre_id === 6,
            'variety_head' => $song->genre_id === 7,
            ])>
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

    

    <!--ボディー-->
        <p class="songName">{{ $song->title }}</p>
    <div class="songHead">
        <p
            @class([
            'songGenre',
            'namori_inSet' => $song->genre_id === 1,
            'game_inSet' => $song->genre_id === 2,
            'pops_inSet' => $song->genre_id === 3,
            'classic_inSet' => $song->genre_id === 4,
            'anime_inSet' => $song->genre_id === 5,
            'vocaloid_inSet' => $song->genre_id === 6,
            'variety_inSet' => $song->genre_id === 7,
        ])>
            {{ $song->genre->name }}
        </p>
        <p class="dif">{{ $song->difficulty->name }}</p>
    </div>

    <!--入力欄-->
    <form action="{{ route('song.result.store',['song' => $song->id]) }}" method="POST">
    @csrf
    <div class="set">
        <div
            @class([
            'inSet',
            'namori_inSet' => $song->genre_id === 1,
            'game_inSet' => $song->genre_id === 2,
            'pops_inSet' => $song->genre_id === 3,
            'classic_inSet' => $song->genre_id === 4,
            'anime_inSet' => $song->genre_id === 5,
            'vocaloid_inSet' => $song->genre_id === 6,
            'variety_inSet' => $song->genre_id === 7,
            ])>
            <div
             @class([
            'inInSet',
            'namori_inInSet' => $song->genre_id === 1,
            'game_inInSet' => $song->genre_id === 2,
            'pops_inInSet' => $song->genre_id === 3,
            'classic_inInSet' => $song->genre_id === 4,
            'anime_inInSet' => $song->genre_id === 5,
            'vocaloid_inInSet' => $song->genre_id === 6,
            'variety_inInSet' => $song->genre_id === 7,
            ])>
                <p class="mess">!!!リザルトを入れてね!!!</p>
                <div class="result">
                    <div>
                        <span class="size">良 : </span><input type="text" class="res" name="good_count">
                    </div>
                    <div>
                        <span class="size">可 : </span><input type="text" class="res" name="ok_count">
                    </div>
                    <div>
                        <span class="size">不可 : </span><input type="text" class="res" name="miss_count">
                    </div>
                    <div>
                        <span class="size">連打 : </span><input type="text" class="res" name="roll_count">
                    </div>
                </div>
                <div class="result">
                    <div>
                        <span class="size2">フルコンボ : </span><input type="checkbox" style="transform: scale(1.5);" name="full_combo" value="1">
                    </div>
                    <div>
                        <span class="size2">ドンダフルコンボ : </span><input type="checkbox" style="transform: scale(1.5);" name="donda_full_combo" value="1">
                    </div>
                    <div>
                        <span class="size2">プレイ回数のみ : </span><input type="checkbox" style="transform: scale(1.5);" name="play_count" value="1">
                    </div>
                </div>
                <div class="result comment">
                    <div class="inComment">
                        <p>コメント</p>
                        <textarea class="inInComment" name="comment"></textarea>
                    </div>
                </div>
                <div class="buttonPosition">
                    <div>
                        <button type="submit"
                        @class([
                            'btn',
                            'btn-danger',
                            'btnOpt',
                            'namori_inSet' => $song->genre_id === 1,
                            'game_inSet' => $song->genre_id === 2,
                            'pops_inSet' => $song->genre_id === 3,
                            'classic_inSet' => $song->genre_id === 4,
                            'anime_inSet' => $song->genre_id === 5,
                            'vocaloid_inSet' => $song->genre_id === 6,
                            'variety_inSet' => $song->genre_id === 7,
                        ])>
                            <span class="add">追加</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>



    <!--リザルト一覧-->
    <div class="resultViews">
        <p class="h1">リザルト一覧</p>
        <div class="flexCenter marginOpt">
            <div class="widthOpt">
                <div class="data">
                    <p>プレイ回数 : {{ $play_count }}</p>
                    <p>フルコンボ : {{ $full_combo_count }}</p>
                    <p>ドンダフルコンボ : {{ $donda_full_combo_count }}</p>
                </div>
            </div>
        </div>
        <div class="order">
            <form class="center" action="{{ route('song.result',['song' => $song->id]) }}" method="GET">
                <p>
                    <select name="order" class="orderBtn">
                        <option value="1" {{ $order == 1 ? 'selected' :  '' }}>新しい順</option>
                        <option value="2" {{ $order == 2 ? 'selected' :  '' }}>古い順</option>
                        <option value="3" {{ $order == 3 ? 'selected' :  '' }}>良の数順</option>
                        <option value="4" {{ $order == 4 ? 'selected' :  '' }}>可の数順</option>
                        <option value="5" {{ $order == 5 ? 'selected' :  '' }}>不可の数順</option>
                        <option value="6" {{ $order == 6 ? 'selected' :  '' }}>連打数順</option>
                        <option value="7" {{ $order == 7 ? 'selected' :  '' }}>フルコンのみ</option>
                        <option value="8" {{ $order == 8 ? 'selected' :  '' }}>ドンフルのみ</option>
                    </select>
                </p>
                <p>
                <button type="submit"
                        @class([
                            'btn',
                            'btn-danger',
                            'btnOpt2',
                            'namori_inSet' => $song->genre_id === 1,
                            'game_inSet' => $song->genre_id === 2,
                            'pops_inSet' => $song->genre_id === 3,
                            'classic_inSet' => $song->genre_id === 4,
                            'anime_inSet' => $song->genre_id === 5,
                            'vocaloid_inSet' => $song->genre_id === 6,
                            'variety_inSet' => $song->genre_id === 7,
                        ])>
                            <span class="add">追加</span>
                </button>
                </P>
            </form>
        </div>
        <div class="inResultViews">
            <div class="widthOpt5">
            <div class="widthOpt2 flexAround alignCenter">
                <div class="widthOpt3">良の数</div>
                <div class="widthOpt3">可の数</div>
                <div class="widthOpt3">不可の数</div>
                <div class="widthOpt3">連打数</div>
                <div class="widthOpt3">王冠</div>
                <div class="widthOpt4">編集</div>
                <div class="widthOpt4">削除</div>
            </div>
            </div>
            
            <!-- リザルト一覧 -->
            @foreach($results as $result)
            <div class="widthOpt5">
                <a href="{{ route('song.result.detail',['result' => $result]) }}" class="linkOpt">
                    <div class="widthOpt2 flexAround alignCenter">
                        <div class="widthOpt3">{{ $result->good_count }}</div>
                        <div class="widthOpt3">{{ $result->ok_count }}</div>
                        <div class="widthOpt3">{{ $result->miss_count }}</div>
                        <div class="widthOpt3">{{ $result->roll_count }}</div>
                        <div class="widthOpt3">
                            @if(($result->full_combo === 1 and $result->donda_full_combo ===1) or ($result->full_combo === 0 and $result->donda_full_combo ===1))
                                ドンフル
                            @elseif(($result->full_combo === 1 and $result->donda_full_combo ===0))
                                フルコン
                            @elseif(($result->full_combo === 0 and $result->donda_full_combo ===0))
                            @endif
                        </div>
                        <div class="widthOpt4">
                            <!--編集アイコン-->
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                                <a xlink:href="{{ route('song.result.edit',['result' => $result->id]) }}">
                                <path d="M 43.125 2 C 41.878906 2 40.636719 2.488281 39.6875 3.4375 L 38.875 4.25 L 45.75 11.125 C 45.746094 11.128906 46.5625 10.3125 46.5625 10.3125 C 48.464844 8.410156 48.460938 5.335938 46.5625 3.4375 C 45.609375 2.488281 44.371094 2 43.125 2 Z M 37.34375 6.03125 C 37.117188 6.0625 36.90625 6.175781 36.75 6.34375 L 4.3125 38.8125 C 4.183594 38.929688 4.085938 39.082031 4.03125 39.25 L 2.03125 46.75 C 1.941406 47.09375 2.042969 47.457031 2.292969 47.707031 C 2.542969 47.957031 2.90625 48.058594 3.25 47.96875 L 10.75 45.96875 C 10.917969 45.914063 11.070313 45.816406 11.1875 45.6875 L 43.65625 13.25 C 44.054688 12.863281 44.058594 12.226563 43.671875 11.828125 C 43.285156 11.429688 42.648438 11.425781 42.25 11.8125 L 9.96875 44.09375 L 5.90625 40.03125 L 38.1875 7.75 C 38.488281 7.460938 38.578125 7.011719 38.410156 6.628906 C 38.242188 6.246094 37.855469 6.007813 37.4375 6.03125 C 37.40625 6.03125 37.375 6.03125 37.34375 6.03125 Z"></path>
                                </a>
                            </svg>
                        </div>
                        <div class="widthOpt4">
                            <!--削除アイコン-->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <a xlink:href="{{ route('song.result.destroy',['song' => $result->id]) }}">
                                <path d="M3 6h18M9 6v12m6-12v12m-9 4h12a2 2 0 002-2V6H5v14a2 2 0 002 2z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </a>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
    <!--ナビ-->
    <div class="navi">
        {{ $results->links() }}
    </div>
    <div class="homeLink">
        <a href="{{ route('home') }}" class="homeLinkA">ホームに戻る</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>