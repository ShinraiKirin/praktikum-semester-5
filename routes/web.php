<?php

use Faker\Guesser\Name;
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
    return view('Tugas-1.welcome');
})->name('welcome');

//rute sederhana
Route::get('/about', function () {
    return 'welcome';
});

//rute nama
Route::get('/contact', function () {
    return view('Tugas-1.contact');
})->name('contact');


//rute group
route::prefix('manage')->group(function () {
    route::get('/user', function () {
        return 'ini adalah halaman user';
    });
    route::get('/edit', function () {
        return 'ini adalah halaman edit';
    });
});