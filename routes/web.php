<?php

use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/home', [\App\Http\Controllers\SiteController::class, 'home'])
    ->name('home' )
    ->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
Route::get('categories/generate-slug',[\App\Http\Controllers\Admin\CategoryController::class, 'generateSlug'])->name('categories.slug');
Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    

});