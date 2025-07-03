<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsAddController;
use App\Http\Controllers\ResultAddController;

Route::get('/', function () {
    return view('welcome');
});

/*曲追加*/
Route::get('/home',[SongsAddController::class, 'index'])->name('home');
Route::post('/home/song-add',[SongsAddController::class, 'store'])->name('song.store');

/*リザルト追加*/
Route::get('/home/result/{song}',[ResultAddController::class, 'index'])->name('song.result');
Route::post('/home/result/{song}/store',[ResultAddController::class, 'store'])->name('song.result.store');


?>
