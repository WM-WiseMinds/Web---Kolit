<?php

use App\Models\Barang;
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

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/barangs', function () {
    $barang = Barang::all();
    return view('barangs', compact('barang'));
});

Route::get('/detail-barang/{id}', function ($id) {
    $barang = Barang::findOrFail($id);
    return view('detail-barang', compact('barang'));
})->name('detail-barang');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/permissions', function () {
        return view('permissions');
    })->name('permissions');

    Route::get('/roles', function () {
        return view('roles');
    })->name('roles');

    Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/pelanggan', function () {
        return view('pelanggan');
    })->name('pelanggan');

    Route::get('/barang', function () {
        return view('barang');
    })->name('barang');

    Route::get('/portfolio', function () {
        return view('portfolio');
    })->name('portfolio');

    Route::get('/keranjang', function () {
        return view('keranjang');
    })->name('keranjang');

    Route::get('/transaksi', function () {
        return view('transaksi');
    })->name('transaksi');

    Route::get('/faq', function () {
        return view('faq');
    })->name('faq');
});
