<?php

namespace App\Http\Controllers;

use App\Barang;
use DataTables;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function data(){
        return DataTables::of(Barang::all())->make(true);
    }
}
