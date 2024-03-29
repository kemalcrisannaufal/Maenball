<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NewsCommentController;

Route::get('/', function(){
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginProcess'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web,admin');

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show'])->middleware('auth:web,admin');
Route::get('/addNews', [NewsController::class, 'create'])->middleware('auth:admin');
Route::post('/news', [NewsController::class, 'store'])->middleware('auth:admin');

Route::post('/news-comment/{id}', [NewsCommentController::class, 'store'])->middleware('auth:web');
Route::post('/news-comment/{id}/reply', [NewsCommentController::class, 'storeReply'])->middleware('auth:web');

Route::get('/highlight', [VideoController::class, 'index'])->middleware('auth:web');
Route::get('/highlight/{id}', [VideoController::class, 'show'])->middleware('auth:web');
Route::get('/addVideo', [VideoController::class, 'create'])->middleware('auth:admin');
Route::post('/highlight', [VideoController::class, 'store'])->middleware('auth:admin');

