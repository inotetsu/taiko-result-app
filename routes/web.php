<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsAddController;
use App\Http\Controllers\ResultAddController;
use App\Http\Controllers\ResultDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

/*曲追加*/
Route::get('/home',[SongsAddController::class, 'index'])->name('home')->middleware('auth');
Route::post('/home/song-add',[SongsAddController::class, 'store'])->name('song.store')->middleware('auth');

/*リザルト追加*/
Route::get('/home/result/{song}',[ResultAddController::class, 'index'])->name('song.result')->middleware('auth');
Route::post('/home/result/{song}/store',[ResultAddController::class, 'store'])->name('song.result.store')->middleware('auth');

/*曲の削除*/
Route::get('/home/song-delete/{song}',[SongsAddController::class, 'destroy'])->name('song.destroy')->middleware('auth');

/*リザルトの削除*/
Route::get('/home/result-delete/{song}',[ResultAddController::class, 'destroy'])->name('song.result.destroy')->middleware('auth');

/*曲情報の編集*/
Route::get('/home/song-edit/{song}',[SongsAddController::class, 'edit'])->name('song.edit')->middleware('auth');

/*曲情報アップデート処理*/
Route::put('/home/song-update/{song}',[SongsAddController::class, 'update'])->name('song.update')->middleware('auth');

/*リザルトの編集*/
Route::get('/home/result-edit/{result}',[ResultAddController::class, 'edit'])->name('song.result.edit')->middleware('auth');

/*リザルトのアップデート処理*/
Route::put('/home/result-update/{result}',[ResultAddController::class, 'update'])->name('song.result.update')->middleware('auth');

/*リザルト詳細ページ*/
Route::get('/home/result-detail/{result}',[ResultDetailController::class, 'index'])->name('song.result.detail')->middleware('auth');

/*ログインページ*/
Route::get('/home/login',[UserController::class, 'index'])->name('login')->middleware('guest');

/*新規登録ページ*/
Route::get('/home/register',[UserController::class, 'create'])->name('register');

/*新規登録処理*/
Route::post('/home/register-store',[UserController::class, 'store'])->name('register.store');

/*ログイン処理*/
Route::post('/home/login-process',[AuthController::class, 'login'])->name('login.process');

/*ログアウト処理*/
Route::post('/home/logout',[AuthController::class, 'logout'])->name('logout');

?>
