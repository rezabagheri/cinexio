<?php

/**
 * Cinexio - A personal movie and series archive management system with social networking features.
 *
 * This file is part of the Cinexio project, a free software for managing and sharing movie archives.
 *
 * @package Cinexio
 * @author Reza Bagheri <rezabagheri@gmail.com>
 * @copyright 2025 Reza Bagheri
 * @license MIT License
 * @version 1.0.0
 * @link https://github.com/rezabagheri/cinexio
 */

use App\Livewire\UserProfile;
use Illuminate\Support\Facades\Route;

/**
 * Home route for unauthenticated users.
 */
Route::get('/', function () {
    return view('welcome');
})->name('home');

/**
 * Dashboard route for authenticated users.
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Profile management routes for authenticated users.
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', UserProfile::class)->name('profile');
});

require __DIR__.'/auth.php';
