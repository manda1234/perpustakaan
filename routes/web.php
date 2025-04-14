<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::resource('buku', BukuController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProsess'])->name('login-Prosess');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('login.register');
Route::post('/register/proses', [LoginController::class, 'prosesRegister'])->name('register.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');