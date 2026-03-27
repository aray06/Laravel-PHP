<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController; // Оставили один раз сверху
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Стандартный дашборд
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Все маршруты, требующие авторизации (логина)
Route::middleware('auth')->group(function () {
    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ТВОИ СТАТЬИ (CRUD)
    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';
