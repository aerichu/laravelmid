<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;


// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});
Route::get('/Controller/user', [Controller::class, 'user'])->name('Controller.user');
Route::get('/Controller/t_user', [Controller::class, 't_user'])->name('Controller.t_user');
Route::post('/Controller/aksi_t_user', [Controller::class, 'user'])->name('home.aksi_t_user');
Route::post('/Controller/aksi_e_user', [Controller::class, 'user'])->name('home.aksi_e_user');
Route::post('/Controller/h_user/{id}', [Controller::class, 'h_user'])->name('Controller.h_user');
Route::post('/Controller/aksi_reset/{id}', [Controller::class, 'aksi_reset'])->name('Controller.aksi_reset');
