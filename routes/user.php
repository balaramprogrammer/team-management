<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LeaderProjectController;
Route::prefix('leader')->name('leader.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
        Route::get('/students',[StudentController::class,'index'])->name('students');
        Route::post('/students/store',[StudentController::class,'store'])->name('students.store');

        Route::post('/student-update',[StudentController::class,'update'])->name('student.update');
        Route::delete('/student-delete/{id}',[StudentController::class,'destroy'])->name('leader.student.delete');

         Route::get('/create-projects', [LeaderProjectController::class,'index'])
                ->name('create.project');


        Route::post('/projects/store', [LeaderProjectController::class,'store'])
                ->name('projects.store');

       Route::get('/projects/edit_project/', [LeaderProjectController::class,'viewForEdit'])
                ->name('edit.project');
    
        Route::get('/projects/view_project/', [LeaderProjectController::class,'projectView'])
                ->name('view_project');

        Route::get('/projects/delete/{id}', [LeaderProjectController::class,'destroy'])
                ->name('projects.delete');

                Route::post('/projects/update', [LeaderProjectController::class, 'update'])
     ->name('projects.update');

 
});
