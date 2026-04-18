<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController; // Все импорты в одном месте
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Маршрут для создания автора (для твоего задания)
Route::post('/authors', [AuthorController::class, 'store']);

// Стандартный дашборд
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Все маршруты, требующие авторизации
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Твои статьи из прошлого задания
    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';
