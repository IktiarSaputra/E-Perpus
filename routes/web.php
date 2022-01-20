<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\Peminjam\PeminjamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/buku', [App\Http\Controllers\HomeController::class, 'book'])->name('list.buku');
    Route::post('/buku/pinjam', [App\Http\Controllers\HomeController::class, 'pinjam'])->name('pinjam.buku');
    Route::get('/notif/pinjam', [App\Http\Controllers\HomeController::class, 'notif'])->name('notif.pinjam');
    Route::get('/buku/dipinjam', [App\Http\Controllers\HomeController::class, 'list_dipinjam'])->name('list.pinjam');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard.admin');
    });
    Route::resource('book', BookController::class)->except(['show']);
    Route::resource('location', LocationController::class)->except(['show']);
    Route::resource('user', UserController::class)->except(['show']);
    Route::resource('pinjam-buku', PeminjamController::class)->except(['show']);
    Route::get('/lokasi/delete/{id}', [LocationController::class, 'destroy'])->name('delete.location');
    Route::get('/buku/delete/{id}', [BookController::class, 'destroy'])->name('delete.book');
    Route::put('/buku/dikembalikan/{id}', [PeminjamController::class, 'dikembalikan'])->name('buku.dikembalikan');
});
