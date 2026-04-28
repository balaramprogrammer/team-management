<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->name('admin.')
    ->middleware(['auth','AdminMiddleware'])
    ->group(function () {

        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('/users',[AdminController::class,'users'])->name('users');
}); 