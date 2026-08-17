<?php

use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::resource('tasks', controller: TaskController::class)->middleware(['auth', HandlePrecognitiveRequests::class]);


require __DIR__.'/settings.php';
