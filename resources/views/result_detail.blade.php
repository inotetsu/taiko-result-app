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
            <ul class="nav">
                <li>{{ $user->name }}</li>
            </ul>
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
                <p class="mess">!!!リザルト情報!!!</p>
                <div class="result">
                    <div>
                        <span class="size">良 : {{ $result->good_count }}</span>
                    </div>
                    <div>
                        <span class="size">可 : {{ $result->ok_count }}</span>
                    </div>
                    <div>
                        <span class="size">不可 : {{ $result->miss_count }}</span>
                    </div>
                    <div>
                        <span class="size">連打 : {{ $result->roll_count }}</span>
                    </div>
                </div>
                
                    <div class="text-align margin-top20">
                        <span class="size2">
                            王冠 : 
                            @if(($result->full_combo === 1 and $result->donda_full_combo ===1) or ($result->full_combo === 0 and $result->donda_full_combo ===1))
                                ドンフル
                            @elseif(($result->full_combo === 1 and $result->donda_full_combo ===0))
                                フルコン
                            @elseif(($result->full_combo === 0 and $result->donda_full_combo ===0))
                            @endif
                        </span>
                    </div>
                    <div class="text-align margin-top20">
                        <span class="size2">登録時間 : {{ $result->created_at }}</span>
                    </div>
                    <div class="text-align margin-top20">
                        <span class="size2">更新時間 : {{ $result->updated_at }}</span>
                    </div>
                
                <div class="result comment">
                    <div class="inComment">
                        <p>コメント</p>
                        <p>{{ $result->comment }}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="font-size30 margin-top50 text-align">
        <a href="{{ route('song.result',['song'=>$song]) }}">リザルト一覧へ戻る</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>