<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\api\SuperAdmin\Master\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::patch('/profile/update', [ProfileController::class, 'update']);
});

//Super Admin
Route::middleware(['auth:sanctum', 'super_admin'])->group(function () {
    //Route USER
    Route::get('/priority-first/users', [UsersController::class, 'index']);
});
