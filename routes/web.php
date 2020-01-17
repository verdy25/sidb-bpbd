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

Route::resource('/pejabat', 'PejabatController');
Route::resource('/nota', 'NotaController');
Route::get('/nota/cetak/{id}', 'NotaController@cetak')->name('cetak.pengajuan');
Route::get('/gudang', 'BarangController@index')->name('gudang');
Route::get('/data', 'BarangController@data')->name('gudang.data');
Route::resource('/permintaan', 'PermintaanController');
Route::get('/permintaan/verif/{id}', 'PermintaanController@edit')->name('permintaan.verif');
Route::prefix('shb')->name('shb.')->group(function () {
    Route::get('/', 'SHBController@index')->name('index');
    Route::get('/data', 'SHBController@shbList')->name('data');
    Route::post('/import_excel', 'SHBController@import_excel')->name('import');
});

Route::get('/cari-shb', 'NotaController@loadDataSHB')->name('cari.shb');
Route::get('/pengeluaran', 'PengeluaranController@index')->name('pengeluaran.index');
Route::put('/pengeluaran/{id}', 'PengeluaranController@update')->name('pengeluaran.keluar');
// Route::put('/pengeluaran/{id}', 'PengeluaranController@bukti_ambil')->name('pengeluaran.ambil');