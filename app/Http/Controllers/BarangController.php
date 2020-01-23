<?php

namespace App\Http\Controllers;

use App\Barang;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index');
    }

    public function data()
    {
        if(Auth::user()->status == "admin" || Auth::user()->status == "kepala"){
            return DataTables::of(Barang::all())->make(true);
        } else {
            return DataTables::of(Barang::whereIn('kode', function ($query) {
                $query->select('kode_barang')->from('detail_notas')->where('nota_id', function ($query) {
                    $query->select('id')->from('notas')->where('id_bidang', Auth::user()->id_bidang);
                });
            })->get())->make(true);
        }
        
    }
}
