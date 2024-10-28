<?php

use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\DashboardController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect('login');
});


Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    #Employer
    Route::controller(EmployeeController::class)->prefix('employee')->group(function() {
        Route::get('/', 'show')->name('employees');
        Route::get('/create', 'create')->name('employee.create');
        Route::post('/store', 'store')->name('employee.store');
        Route::get('/edit/{id}', 'edit')->name('employee.edit');
        Route::put('/update/{id}', 'update')->name('employee.update');
        Route::delete('/delete/{id}', 'delete')->name('employee.delete');
    });


    #CheckPont
    Route::controller(CheckpointController::class)->prefix('checkpoint')->group(function(){
        Route::get('/', 'show')->name('checkpoint');
        Route::post('/', 'doCheckPoint')->name('checkpoint.post');
        Route::post('/filter', 'filter')->name('checkpoint.filter');
    });

});

require __DIR__.'/auth.php';
