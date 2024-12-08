<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::resource('categories', CategoryController::class);

Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::resource('items', ItemController::class);
