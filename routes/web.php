<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>
    view('homepage'));
Route::resource('jobs', JobController::class)
->only(['index','show']);
Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)
->only(['create','store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');
Route::middleware('auth')->group(function () {
        Route::resource('job.application', JobApplicationController::class)
            ->only(['create', 'store']);
        Route::resource('my-job-applications', MyJobApplicationController::class)
            ->only(['index','destroy']);
        Route::resource('employer', EmployerController::class)
            ->only(['create', 'store']);
    
        Route::middleware('employer')->group(function () {
            Route::resource('my-jobs', MyJobController::class);
            
            Route::get('/download/{filename}', function ($filename) {
                $path = storage_path('app/private' . $filename);
                if (!file_exists($path)) {
                    abort(404);
                }
                return response()->download($path);
            })->name('file.download');
        });
    });
    
    
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);