<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\RoutingPriority1Controller;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [RoutingController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/guest/dashboard', [RoutingController::class, 'dashboard'])->name('default.dashboard');
});

//SUPER ADMIN
Route::middleware(['auth', 'verified'])->prefix('priority-first')->group(function () {
    Route::get('/dashboard', [RoutingPriority1Controller::class, 'dashboard'])->name('super.admin.dashboard');
    Route::get('/user', [RoutingPriority1Controller::class, 'user'])->name('super.admin.user');

    //
    Route::get('/division', [RoutingPriority1Controller::class, 'division'])->name('super.admin.division');
    Route::get('/permission', [RoutingPriority1Controller::class, 'permission'])->name('super.admin.permission');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/change-password', [ProfileController::class, 'changepassword'])->name('profile.changepassword');
    //Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
