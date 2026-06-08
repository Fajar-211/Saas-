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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/priority-first/dashboard', [RoutingPriority1Controller::class, 'dashboard'])->name('super.admin.dashboard');
    Route::get('/priority-first/user', [RoutingPriority1Controller::class, 'user'])->name('super.admin.user');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
