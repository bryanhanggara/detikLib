<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix("home")->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('home.dashboard');
    Route::resource('categories', CategorieController::class);
    Route::resource('books', BookController::class);
    Route::get('list-books', [ListController::class, 'index'])->name('list.index');
    Route::delete('list-books/{id}', [ListController::class, 'destroy'])->name('list.destroy');
    Route::get('list-books/{id}', [ListController::class, 'edit'])->name('list.edit');
    Route::get('list-books/export/pdf', [ListController::class, 'exportToPdf'])->name('books.export.pdf');
});

