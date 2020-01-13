<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Permintaan;
use Illuminate\Http\Request;

class BPermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaans = Permintaan::all();
        return view('bidang.permintaan.index', compact('permintaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('bidang.permintaan.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang' => 'required',
            'jumlah' => 'required|numeric|min:1'
        ]);

        Permintaan::create([
            'id_user' => 1,
            'id_barang' => $request->barang,
            'jumlah_minta' => $request->jumlah,
            'jumlah_terima' => 0,
            'status' => 'belum diverifikasi',
            'keterangan' => ''
        ]);

        return redirect()->route('bidang.permintaan.index')->with('success', 'Berhasil mengajukan permintaan, mohon ditunggu untuk proses verifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = Permintaan::find($id);
        return view('bidang.permintaan.detail', compact('permintaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
