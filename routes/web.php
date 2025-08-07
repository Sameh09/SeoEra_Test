<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PostsController;
use App\Http\Middleware\IsRegularUser;
use Illuminate\Support\Facades\Route;

Route::middleware([IsRegularUser::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('posts', PostsController::class)->middleware('auth'); 
});

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
