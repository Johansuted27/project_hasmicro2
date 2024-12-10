<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckInputController;
use App\Http\Controllers\Master\GroupController;
use App\Http\Controllers\Master\UserController;

Route::get('/test', function(){
    dd(Hash::make('admin123'));
});

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/input_user', [CheckInputController::class, 'index'])->name('index.form');
    Route::get('/process_form', [CheckInputController::class, 'process'])->name('form.input.user');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/group', [GroupController::class, 'index'])->name('group.index');
    Route::get('/group/create', [GroupController::class, 'create'])->name('group.create');
    Route::get('/group/list', [GroupController::class, 'list'])->name('group.list');
    Route::post('/group/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/group/{id}/edit', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/group/{id}/update', [GroupController::class, 'update'])->name('group.update');
    Route::delete('/group/{id}/destroy', [GroupController::class, 'destroy'])->name('group.destroy');

});


