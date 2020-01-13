<?php

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

Route::get('/404', function () {
    return view('404');
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/buttons', function () {
    return view('buttons');
});

Route::get('/cards', function () {
    return view('cards');
});

Route::get('/charts', function () {
    return view('charts');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/utilities-animation', function () {
    return view('utilities-animation');
});

Route::get('/utilities-border', function () {
    return view('utilities-border');
});

Route::get('/utilities-color', function () {
    return view('utilities-color');
});

Route::get('/utilities-other', function () {
    return view('utilities-other');
});

Route::resource('/barang', 'BarangController');
Route::resource('/nota', 'NotaController');
// Route::get('/detailnota/{id}', 'NotaController@detailnota')->name('detail.nota.edit');

Route::prefix('bidang')->name('bidang.')->group(function () {
    Route::resource('/permintaan', 'BPermintaanController');
    Route::resource('/peminjaman', 'BPeminjamanController');
});

Route::prefix('sekretaris')->name('sekretaris.')->group(function () {
    Route::resource('/permintaan', 'SPermintaanController');
    Route::resource('/peminjaman', 'SPeminjamanController');
});