<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::middleware(['auth', 'check.status'])->group(function () {
    // Здесь твои защищенные маршруты
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
