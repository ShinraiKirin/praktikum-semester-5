<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtsController;
use App\Http\Controllers\ProdukController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin,owner'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/produk',[ProductController::class, 'index']);

Route::get('/route_cont/{id}',[ProductController::class, 'show']);

Route::get('/produk/{angka}', [ProductController::class, 'index'])
    ->middleware(['auth', 'role:admin,owner']);

Route::get('/langganan', function () {
    return view('langganan');
});


Route::get('/uts', [UtsController::class, 'index'])->name('uts.index');
Route::get('/uts/pemrograman-web', [UtsController::class, 'pemrogramanWeb'])->name('uts.web');
Route::get('/uts/database', [UtsController::class, 'database'])->name('uts.database');

Route::get('/produk/{nilai}', [ProdukController::class, 'tampil']);

// Menampilkan semua data produk (halaman daftar produk)
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
// Menampilkan form untuk menambahkan produk baru
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
// Menyimpan data produk baru dari form ke database
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
// Menampilkan form untuk mengedit data produk tertentu (berdasarkan id)
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Memperbarui data produk di database setelah form edit disubmit
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
// Menghapus data produk tertentu dari database
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier-index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier-create');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier-store');