<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;


Route::get('/', fn () => view('welcome'));

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/news', [App\Http\Controllers\NewsController::class, 'news'])->name('news');
    Route::get('/categories',[App\Http\Controllers\CategoriesController::class, 'categories'])->name('categories');
    // Route::get('/menu-one', [App\Http\Controllers\MenuController::class, 'menuOne'])->name('menu-one');
    // Route::get('/menu-two', [App\Http\Controllers\MenuController::class, 'menuTwo'])->name('menu-two');
    // Route::get('/menu-three',[App\Http\Controllers\MenuController::class, 'menuThree'])->name('menu-three');
    // Route::get('/menu-four', [App\Http\Controllers\MenuController::class, 'menuFour'])->name('menu-four');
    // Route::get('/meuu-five', [App\Http\Controllers\MenuController::class, 'menuFive'])->name('menu-five');
    
});
