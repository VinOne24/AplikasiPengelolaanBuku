<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/caribuku', [App\Http\Controllers\BukuController::class, 'cari'])->name('cari');
Route::get('/tambahbuku', [App\Http\Controllers\BukuController::class, 'create'])->name('create');
Route::get('/buku/{id}/edit', [App\Http\Controllers\BukuController::class, 'edit'])->name('edit');
Route::post('/buku/{id}/update', [App\Http\Controllers\BukuController::class, 'update'])->name('update');
Route::get('/index', [App\Http\Controllers\BukuController::class, 'index'])->name('index');
Route::post('/buku/store', [App\Http\Controllers\BukuController::class, 'store'])->name('store');

Route::get('/pinjambuku/{id}/pinjam', [App\Http\Controllers\BukuController::class, 'pinjam'])->name('pinjam');
Route::post('/pinjambuku/peminjaman', [App\Http\Controllers\BukuController::class, 'peminjaman'])->name('peminjaman');
Route::get('/peminjaman-index', [App\Http\Controllers\BukuController::class, 'peminjamanindex'])->name('peminjaman.index');
