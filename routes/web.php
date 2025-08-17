<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsAddController;
use App\Http\Controllers\ResultAddController;
use App\Http\Controllers\ResultDetailController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

/*曲追加*/
Route::get('/home',[SongsAddController::class, 'index'])->name('home');
Route::post('/home/song-add',[SongsAddController::class, 'store'])->name('song.store');

/*リザルト追加*/
Route::get('/home/result/{song}',[ResultAddController::class, 'index'])->name('song.result');
Route::post('/home/result/{song}/store',[ResultAddController::class, 'store'])->name('song.result.store');

/*曲の削除*/
Route::get('/home/song-delete/{song}',[SongsAddController::class, 'destroy'])->name('song.destroy');

/*リザルトの削除*/
Route::get('/home/result-delete/{song}',[ResultAddController::class, 'destroy'])->name('song.result.destroy');

/*曲情報の編集*/
Route::get('/home/song-edit/{song}',[SongsAddController::class, 'edit'])->name('song.edit');

/*曲情報アップデート処理*/
Route::put('/home/song-update/{song}',[SongsAddController::class, 'update'])->name('song.update');

/*リザルトの編集*/
Route::get('/home/result-edit/{result}',[ResultAddController::class, 'edit'])->name('song.result.edit');

/*リザルトのアップデート処理*/
Route::put('/home/result-update/{result}',[ResultAddController::class, 'update'])->name('song.result.update');

/*リザルト詳細ページ*/
Route::get('/home/result-detail/{result}',[ResultDetailController::class, 'index'])->name('song.result.detail');

/*ログインページ*/
Route::get('/home/login',[UserController::class, 'index'])->name('login');

/*新規登録ページ*/
Route::get('/home/register',[UserController::class, 'create'])->name('register');

?>
