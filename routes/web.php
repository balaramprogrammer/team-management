<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () { 
    return view('welcome');
})->name('welcome');


Route::get('/register',[AuthController::class,'showRegister'])->name('showRegister');

Route::post('/save-record', [AuthController::class, 'save'])->name('save_record');  
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login-user', [AuthController::class, 'login'])->name('login_user');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

/* Admin routes register */
require __DIR__.'/admin.php';

/* User routes register */
require __DIR__.'/user.php';