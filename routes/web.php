<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NewsCommentController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginProcess'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web,admin');

Route::get('/news', [NewsController::class, 'index'])->middleware('auth:web');
Route::get('/news/{id}', [NewsController::class, 'show'])->middleware('auth:web,admin');

Route::get('/add-news', [NewsController::class, 'create'])->middleware('auth:admin');
Route::get('/list-news', [NewsController::class, 'list'])->middleware('auth:admin');
Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->middleware('auth:admin');
Route::put('/news/edit/{id}', [NewsController::class, 'update'])->middleware('auth:admin');
Route::delete('/news/delete/{id}', [NewsController::class, 'destroy'])->middleware('auth:admin');

Route::post('/news', [NewsController::class, 'store'])->middleware('auth:admin');

Route::post('/news-comment/{id}', [NewsCommentController::class, 'store'])->middleware('auth:web');
Route::post('/news-comment/{id}/reply', [NewsCommentController::class, 'storeReply'])->middleware('auth:web');

Route::get('/highlight', [VideoController::class, 'index'])->middleware('auth:web');
Route::get('/highlight/{id}', [VideoController::class, 'show'])->middleware('auth:web');

Route::get('/add-highlight', [VideoController::class, 'create'])->middleware('auth:admin');
Route::get('/list-highlight', [VideoController::class, 'list'])->middleware('auth:admin');
Route::delete('/highlight/delete/{id}', [VideoController::class, 'destroy'])->middleware('auth:admin');
Route::get('/highlight/edit/{id}', [VideoController::class, 'edit'])->middleware('auth:admin');
Route::put('/highlight/edit/{id}', [VideoController::class, 'update'])->middleware('auth:admin');
Route::post('/highlight', [VideoController::class, 'store'])->middleware('auth:admin');

