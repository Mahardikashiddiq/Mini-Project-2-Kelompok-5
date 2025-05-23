<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profil', [ProfileController::class, 'showEditProfileForm']);
Route::post('/profil', [ProfileController::class, 'update']);
Route::get('/tambah-user', [UserController::class, 'index'])->name('tambah.user');
Route::post('/tambah-user', [UserController::class, 'store'])->name('user.store');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/user-view', function () {
    return view('user');
})->name('user');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/transaksi', function () {
    return view('transaksi');
})->name('transaksi');

Route::get('/statistik', function () {
    return view('statistik');
})->name('statistik');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');
