<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class, 'proses'])->name('login.proses');
Route::get('login/keluar',[LoginController::class,'keluar'])->name('login.keluar');
Route::get('user', [UserController::class, 'index'])->name('user.tampil');
Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.tampil');
Route::post('pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.tampil');
Route::post('/pendaftaran/terima/{id}', [PendaftaranController::class, 'terima'])->name('pendaftaran.terima');
Route::delete('pendaftaran/destroy/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
Route::get('pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
Route::put('pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/dashboard', [HomeController::class, 'index2']);
