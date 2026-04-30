<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PageController::class, 'dashboard'])->name('overview');
    Route::post('deauthenticate', [AuthController::class, 'deauthenticate'])->name('deauthenticate');
});
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', function () {
        return Inertia::render('auth/Login');
    })->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate']);
});
