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

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/', function () {
        return view('index');
    });

    // Route::resource('/pejabat', 'PejabatController');
    Route::get('/pejabat', 'PejabatController@index')->name('pejabat.index');

    //shb
    Route::prefix('shb')->name('shb.')->group(function () {
        Route::get('/data', 'SHBController@shbList')->name('data');
        Route::post('/import_excel', 'SHBController@import_excel')->name('import');
    });
    Route::get('/shb', 'SHBController@index')->name('shb.index');
    Route::get('/cari-shb', 'NotaController@loadDataSHB')->name('cari.shb');

    //pengeluaran
    Route::get('/pengeluaran', 'PengeluaranController@index')->name('pengeluaran.index');

    // Route::resource('/nota', 'NotaController');
    Route::get('/nota', 'NotaController@index')->name('nota.index');
    Route::get('/nota/create', 'NotaController@create')->name('nota.create');
    Route::post('/nota', 'NotaController@store')->name('nota.store');
    Route::get('/nota/{id}', 'NotaController@show')->name('nota.show');
    Route::put('/nota/{id}', 'NotaController@update')->name('nota.update');
    Route::delete('/nota/{id}', 'NotaController@destroy')->name('nota.destroy');

    // Route::resource('/permintaan', 'PermintaanController');
    Route::get('/permintaan', 'PermintaanController@index')->name('permintaan.index');
    Route::get('/permintaan/create', 'PermintaanController@create')->name('permintaan.create');
    Route::post('/permintaan', 'PermintaanController@store')->name('permintaan.store');
    Route::get('/permintaan/{id}', 'PermintaanController@show')->name('permintaan.show');
    Route::put('/permintaan/ubah/{id}', 'PermintaanController@update_permintaan')->name('permintaan.update');
    Route::delete('/permintaan/{id}', 'PermintaanController@destroy')->name('permintaan.destroy');
    Route::get('/permintaan/ubah/{id}', 'PermintaanController@ubah')->name('permintaan.ubah');

    //cetak
    Route::get('/nota/cetak/{id}', 'NotaController@cetak')->name('cetak.pengajuan');
    Route::get('/permintaan/cetak/{id}', 'PermintaanController@cetak')->name('cetak.permintaan');
    Route::get('/pengeluaran/sppb/{id}/cetak', 'PengeluaranController@sppb_print')->name('cetak.sppb');
    Route::get('/permintaan/bpbg/{id}/cetak', 'PengeluaranController@bpbg_print')->name('cetak.bpbg');

    //gudang
    Route::get('/gudang', 'BarangController@index')->name('gudang');
    Route::get('/gudang-data', 'BarangController@data')->name('gudang.data');

    Route::group(['middleware' => 'cekstatus:sekretariat,kepala,admin'], function () {

        // persetujuan
        Route::get('/permintaan/verif/{id}', 'PermintaanController@edit')->name('permintaan.verif');
        Route::put('/permintaan/{id}', 'PermintaanController@store_persetujuan')->name('persetujuan.store');
        Route::get('/persetujuan/{id}/edit', 'PermintaanController@persetujuan_edit')->name('persetujuan.edit');
        Route::put('/persetujuan/{id}', 'PermintaanController@persetujuan_update')->name('persetujuan.update');


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
    });

    Route::group(['middleware' => 'cekstatus:sekretariat,admin'], function () {

        //pejabat
        Route::post('/pejabat', 'PejabatController@store')->name('pejabat.store');
        Route::get('/pejabat/{id}', 'PejabatController@show')->name('pejabat.show');
        Route::get('/pejabat/{id}/edit', 'PejabatController@edit')->name('pejabat.edit');
        Route::put('/pejabat/{id}', 'PejabatController@update')->name('pejabat.update');
        Route::delete('/pejabat/{id}', 'PejabatController@destroy')->name('pejabat.destroy');
    });
});
