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
// Route::resource('/pengajuan', 'PengajuanController');

// Route::resource('/barang', 'BarangController');
Route::resource('/nota', 'NotaController');
Route::get('/nota/cetak/{id}', 'NotaController@cetak')->name('cetak.pengajuan');
// Route::get('/detailnota/{id}', 'NotaController@detailnota')->name('detail.nota.edit');

// Route::prefix('bidang')->name('bidang.')->group(function () {
//     Route::resource('/permintaan', 'BPermintaanController');
//     Route::resource('/peminjaman', 'BPeminjamanController');
// });

// Route::prefix('sekretaris')->name('sekretaris.')->group(function () {
//     Route::resource('/permintaan', 'SPermintaanController');
//     Route::resource('/peminjaman', 'SPeminjamanController');
// });

Route::resource('/permintaan', 'PermintaanController');



Route::prefix('shb')->name('shb.')->group(function () {
    Route::get('/', 'SHBController@index')->name('index');
    Route::post('/import_excel', 'SHBController@import_excel')->name('import');
    Route::get('/suku_cadang', 'SHBController@suku_cadang')->name('suku_cadang');
    Route::get('/bahan', 'SHBController@bahan')->name('bahan');
    Route::get('/natura', 'SHBController@natura')->name('natura');
    Route::get('/alat_besar', 'SHBController@alat_besar')->name('alat_besar');
    Route::get('/alat_angkutan', 'SHBController@alat_angkutan')->name('alat_angkutan');
    Route::get('/alat_bengkel', 'SHBController@alat_bengkel')->name('alat_bengkel');
    Route::get('/alat_kantor', 'SHBController@alat_kantor')->name('alat_kantor');
    Route::get('/alat_studio', 'SHBController@alat_studio')->name('alat_studio');
    Route::get('/komputer', 'SHBController@komputer')->name('komputer');
    Route::get('/pertanian', 'SHBController@pertanian')->name('pertanian');
    Route::get('/obat', 'SHBController@obat')->name('obat');
    Route::get('/buku', 'SHBController@buku')->name('buku');
    Route::get('/honor', 'SHBController@honor')->name('honor');
    Route::get('/biaya', 'SHBController@biaya')->name('biaya');
});
