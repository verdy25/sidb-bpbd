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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/404', function () {
    return view('404');
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


//pejabat
Route::resource('/pejabat', 'PejabatController');

//nota
Route::resource('/nota', 'NotaController');

//gudang
Route::get('/gudang', 'BarangController@index')->name('gudang');
Route::get('/data', 'BarangController@data')->name('gudang.data');

//permintaan
Route::resource('/permintaan', 'PermintaanController');
Route::get('/permintaan/verif/{id}', 'PermintaanController@edit')->name('permintaan.verif');

// persetujuan
Route::get('/persetujuan/{id}/edit', 'PermintaanController@persetujuan_edit')->name('persetujuan.edit');
Route::put('/persetujuan/{id}', 'PermintaanController@persetujuan_update')->name('persetujuan.update');

//shb
Route::prefix('shb')->name('shb.')->group(function () {
    Route::get('/', 'SHBController@index')->name('index');
    Route::get('/data', 'SHBController@shbList')->name('data');
    Route::post('/import_excel', 'SHBController@import_excel')->name('import');
});

//pengeluaran
Route::get('/pengeluaran', 'PengeluaranController@index')->name('pengeluaran.index');

//sppb
Route::get('/pengeluaran/sppb/{id}', 'PengeluaranController@sppb_create')->name('sppb.create');
Route::put('/pengeluaran/sppb/{id}', 'PengeluaranController@sppb_store')->name('sppb.store');
Route::get('/pengeluaran/{id}/sppb', 'PengeluaranController@sppb')->name('sppb.edit');
Route::put('/pengeluaran/{id}/sppb', 'PengeluaranController@sppb_update')->name('sppb.update');

//bpbg
Route::get('/pengeluaran/bpbg/{id}', 'PengeluaranController@bpbg_create')->name('bpbg.create');
Route::put('/pengeluaran/bpbg/{id}', 'PengeluaranController@bpbg_store')->name('bpbg.store');
Route::get('/pengeluaran/{id}/bpbg', 'PengeluaranController@bpbg')->name('bpbg.edit');
Route::put('/pengeluaran/{id}/bpbg', 'PengeluaranController@bpbg_update')->name('bpbg.update');

//cetak
Route::get('/nota/cetak/{id}', 'NotaController@cetak')->name('cetak.pengajuan');
Route::get('/permintaan/cetak/{id}', 'PermintaanController@cetak')->name('cetak.permintaan');
Route::get('/pengeluaran/sppb/{id}/cetak', 'PengeluaranController@sppb_print')->name('cetak.sppb');
Route::get('/permintaan/bpbg/{id}/cetak', 'PengeluaranController@bpbg_print')->name('cetak.bpbg');

//pencarian
Route::get('/cari-shb', 'NotaController@loadDataSHB')->name('cari.shb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
