<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Index\NewsController;
use App\Http\Controllers\Index\PageController;
use Illuminate\Support\Facades\Route;


Route::resource('login',LoginController::class);
Route::resource('register',RegisterController::class);
Route::resource('admin',NewsController::class)->middleware(['auth','admin']);

Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/pages/{rubric_name}',[PageController::class,'pages'])->name('page');
Route::get('/pages/news/{id}',[PageController::class,'onePage'])->name('onePage');
Route::get('/search',[PageController::class,'search'])->name('search');
