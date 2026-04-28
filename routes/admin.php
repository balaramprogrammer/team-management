<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->name('admin.')
    ->middleware(['auth','AdminMiddleware'])
    ->group(function () {

        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('/team-leader',[AdminController::class,'team_leader'])->name('team_leader');
        Route::post('/save-permission',[AdminController::class,'savePermission'])->name('save_permission');
        Route::get('/get-permissions/{id}',[AdminController::class,'getPermissions'])->name('get_permissions');
        Route::post('/update-leader', [AdminController::class,'updateLeader']);
        Route::delete('/delete-leader/{id}',[AdminController::class,'deleteLeader'])->name('delete_leader');

}); 