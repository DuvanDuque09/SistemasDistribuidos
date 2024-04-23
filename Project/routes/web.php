<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Dashboard\Admin;
use App\Livewire\Dashboard\Agente;
use App\Livewire\Managements\IndexManagement;
use App\Livewire\Users\IndexUser;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/admin', Admin::class)->name('dashboard.admin');
    Route::get('dashboard/agente', Agente::class)->name('dashboard.agente');
    Route::get('users', IndexUser::class)->name('users.index');
    Route::get('search', IndexManagement::class)->name('management.index');
});


Route::get('reset', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});
