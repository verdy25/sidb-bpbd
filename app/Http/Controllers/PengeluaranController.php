<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::orderBy('created_at', 'DESC')->get();
        return view('pengeluaran.index', compact('pengeluarans'));
     }

    public function update(Request $request, $id)
    {
       $request->validate([
           'nomor_keluar' => 'required|unique:pengeluarans,nomor_keluar'
       ]);

       Pengeluaran::where('id', $id)->update([
           'nomor_keluar' => $request->nomor_keluar
       ]);

       return back()->with('success', 'Berhasil menambah nomor surat perintah pengeluaran / penyaluran barang');
    }

    public function bukti_ambil(Request $request, $id)
    {
       $request->validate([
           'nomor_ambil' => 'required|unique:pengeluarans,nomor_ambil'
       ]);

       Pengeluaran::where('id', $id)->update([
        'nomor_ambil' => $request->nomor_ambil
    ]);

       return back()->with('success', 'Berhasil menambah nomor bukti pengambilan barang dari gudang');
    }
}
