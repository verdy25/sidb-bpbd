<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPermintaan;
use App\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaans = Permintaan::orderby('created_at', 'DESC')->get();
        return view('permintaan.index', compact('permintaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('permintaan.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'kepada' => 'required',
                'pemohon' => 'required',
                'nomor' => 'required',
                'perihal' => 'required',
            ]
        );

        Permintaan::create(
            [
                'kepada' => $request->kepada,
                'pemohon' => $request->pemohon,
                'nomor' => $request->nomor,
                'perihal' => $request->perihal,

            ]
        );

        $form = $request->volume;

        for ($i = 0; $i < count($form) - 1; $i++) {
            //    $s = Barang::find($request->barang[$i]);
            $volume = preg_replace('/[^\d]/', '', $request->volume[$i]);
            DetailPermintaan::create([
                // 'nota_id' =>  Nota::get()->last()->id,
                'id_permintaan' => Permintaan::get()->last()->id,
                'id_barang' => $request->barang[$i],
                'jumlah' => $volume,
            ]);
        }

        return redirect()->route('permintaan.index')->with('success', 'Berhasil menambahkan permintaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $detail_permintaan = DetailPermintaan::where('id_permintaan', $id)->get();

        return view('permintaan.detail.index', compact('permintaan', 'detail_permintaan'));
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
        DetailPermintaan::where('id_permintaan', $id)->delete();
        Permintaan::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
