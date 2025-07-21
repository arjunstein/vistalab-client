<?php

use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Pms\CreatePms;
use App\Livewire\Pms\EditPms;
use App\Livewire\Pms\ListPms;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/login', Login::class)->name('login')->middleware('guest');

// Route group middleware auth
Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // interface
    Route::get('/interface', ListPms::class)->name('list-pms');
    Route::get('/interface/add', CreatePms::class)->name('add-pms');
    Route::get('/interface/{pms}/edit', EditPms::class)->name('edit-pms');
});
