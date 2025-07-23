<?php

use App\Livewire\Auth\Login;
use App\Livewire\Customer\CreateCustomer;
use App\Livewire\Customer\EditCustomer;
use App\Livewire\Customer\ListCustomer;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Pms\CreatePms;
use App\Livewire\Pms\EditPms;
use App\Livewire\Pms\ListPms;
use App\Livewire\User\CreateUser;
use App\Livewire\User\EditUser;
use App\Livewire\User\ListUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/login', Login::class)->name('login')->middleware('guest');

// Route group middleware auth
Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // User
    Route::get('/user', ListUser::class)->name('list-user');
    Route::get('/user/add', CreateUser::class)->name('add-user');
    Route::get('/user/{user}/edit', EditUser::class)->name('edit-user');

    // interface
    Route::get('/interface', ListPms::class)->name('list-pms');
    Route::get('/interface/add', CreatePms::class)->name('add-pms');
    Route::get('/interface/{pms}/edit', EditPms::class)->name('edit-pms');

    // customer
    Route::get('/customer', ListCustomer::class)->name('list-customer');
    Route::get('/customer/add', CreateCustomer::class)->name('add-customer');
    Route::get('/customer/{customer}/edit', EditCustomer::class)->name('edit-customer');
});
