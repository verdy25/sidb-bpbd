<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $satuans = [
            'lusin', 'rim', 'buah'
        ];
        $barangs = Barang::all();
        return view('barang', compact('barangs', 'satuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_pokok' => 'required|numeric',
            'satuan' => 'required'
        ]);

        Barang::create([
            'nama' => $request->nama_barang,
            'harga_pokok' => $request->harga_pokok,
            'stok' => 0,
            'satuan' => $request->satuan
        ]);

        return redirect('/barang')->with('success', 'Berhasil memasukkan data');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang-edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang' => 'required',
            'harga_pokok' => 'required|numeric|min:0'
        ]);

        Barang::where('id', $id)->update([
            'nama' => $request->barang,
            'harga_pokok' => $request->harga_pokok
        ]);
        return redirect()->route('barang.index')->with('success', 'Data berhasil diubah');
    }
}
