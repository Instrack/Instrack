<?php

use App\Http\Controllers\Repositories;
use App\Http\Controllers\Teams;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('home');

Route::get('/profile/{username}', [User::class, 'profile'])->name('profile');

Route::get('/teams', [Teams::class, 'view'])->name('teams');

Route::get('/repositories', [Repositories::class, 'view'])->name('repositories');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
