<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('tenants/change/{tenantId}', \App\Http\Controllers\TenantController::class)->name('tenants.change');

    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class)
        ->only('index', 'store')
        ->middleware('can:manage-users');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
