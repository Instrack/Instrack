<?php

use App\Http\Controllers\Issues;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Repositories;
use App\Http\Controllers\Teams;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('home');

Route::get('/profile/{username}', [User::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/teams', [Teams::class, 'view'])->name('teams')->middleware('auth');

Route::get('/issues', [Issues::class, 'view'])->name('issues')->middleware('auth');

Route::get('/repositories', [Repositories::class, 'view'])->name('repositories')->middleware('auth');
Route::get('/repositories/{slug}', [Repositories::class, 'get'])->name('repositories.manage')->middleware('auth');

Route::get('/projects', [Projects::class, 'view'])->name('projects')->middleware('auth');
Route::get('/projects/{slug}', [Projects::class, 'details'])->name('projects.details')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
