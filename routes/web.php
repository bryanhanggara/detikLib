<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix("home")->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('home.dashboard');
    Route::resource('categories', CategorieController::class);
    Route::resource('books', BookController::class);
});