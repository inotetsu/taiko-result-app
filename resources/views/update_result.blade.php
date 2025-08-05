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
            <span class="titleName">音ゲーリザルト記録!</span>
        </div>
        <div class="menu">
            <ul class="nav">
                <li>アカウント名</li>
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

    <?php
        $full_combo = old('full_combo' , $result->full_combo);
        $donda_full_combo = old('donda_full_combo' , $result->donda_full_combo);
    ?>

    <!--入力欄-->
    <form action="{{ route('song.result.update',['result' => $result->id]) }}" method="POST">
    @csrf
    @method('PUT')
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
                        <span class="size">良 : </span><input type="text" class="res" name="good_count" value="{{ old( 'good_count' , $result->good_count ) }}">
                    </div>
                    <div>
                        <span class="size">可 : </span><input type="text" class="res" name="ok_count" value="{{ old( 'ok_count' , $result->ok_count ) }}">
                    </div>
                    <div>
                        <span class="size">不可 : </span><input type="text" class="res" name="miss_count" value="{{ old( 'miss_count' , $result->miss_count ) }}">
                    </div>
                    <div>
                        <span class="size">連打 : </span><input type="text" class="res" name="roll_count" value="{{ old( 'roll_count' , $result->roll_count ) }}">
                    </div>
                </div>
                <div class="result">
                    <div>
                        <span class="size2">フルコンボ : </span><input type="checkbox" style="transform: scale(1.5);" name="full_combo" value="1" {{ $full_combo == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        <span class="size2">ドンダフルコンボ : </span><input type="checkbox" style="transform: scale(1.5);" name="donda_full_combo" value="1" {{ $donda_full_combo == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        <span class="size2">プレイ回数のみ : </span><input type="checkbox" style="transform: scale(1.5);" name="play_count" value="1">
                    </div>
                </div>
                <div class="result comment">
                    <div class="inComment">
                        <p>コメント</p>
                        <textarea class="inInComment" name="comment">{{ old('comment',$result->comment) }}</textarea>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>