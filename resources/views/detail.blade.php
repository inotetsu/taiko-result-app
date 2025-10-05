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

     <!--エラーメッセージ-->
     @if($errors->any())
        <div class="error">
            <p class="error_mess">良・可・不可・連打数は半角数字の必須入力です</p>
        </div>
     @endif

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
                <div class="result column1">
                    <div class="flex">
                    <div class="marginOptGood">
                        <span class="size">良 : </span><input type="text" class="res" name="good_count">
                    </div>
                    <div class="marginOptOk">
                        <span class="size">可 : </span><input type="text" class="res" name="ok_count">
                    </div>
                    </div>
                    <div class="flex">
                    <div class="marginOptMiss">
                        <span class="size">不可 : </span><input type="text" class="res" name="miss_count">
                    </div>
                    <div class="marginOptRoll">
                        <span class="size">連打 : </span><input type="text" class="res" name="roll_count">
                    </div>
                    </div>
                </div>
                <div class="result column2">
                    <div class="marginBottom5">
                        <span class="size2">フルコンボ : </span><input type="checkbox" style="transform: scale(1.5);" name="full_combo" value="1">
                    </div>
                    <div class="marginBottom5">
                        <span class="size2">全良 : </span><input type="checkbox" style="transform: scale(1.5);" name="donda_full_combo" value="1">
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
                    <p class="marginBottom5">プレイ回数 : {{ $play_count }}</p>
                    <p class="marginBottom5">フルコンボ : {{ $full_combo_count }}</p>
                    <p>全良 : {{ $donda_full_combo_count }}</p>
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
                        <option value="8" {{ $order == 8 ? 'selected' :  '' }}>全良のみ</option>
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
                                全良
                            @elseif(($result->full_combo === 1 and $result->donda_full_combo ===0))
                                フルコン
                            @elseif(($result->full_combo === 0 and $result->donda_full_combo ===0))
                            @endif
                        </div>
                        <div class="widthOpt4">
                            <!--編集アイコン-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <a xlink:href="{{ route('song.result.edit',['result' => $result->id]) }}">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                </a>
                            </svg>
                        </div>
                        <div class="widthOpt4">
                            <!--削除アイコン-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <a xlink:href="{{ route('song.result.destroy',['song' => $result->id]) }}">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
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