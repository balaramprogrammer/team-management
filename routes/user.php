<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::prefix('user')->name('user.')
    ->middleware(['auth','UserMiddleware'])
    ->group(function () {

        Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
         
});