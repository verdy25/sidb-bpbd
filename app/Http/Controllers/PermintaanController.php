<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPengeluaran;
use App\DetailPermintaan;
use App\PejabatBarang;
use App\Pengeluaran;
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
        $pejabat = PejabatBarang::all();
        return view('permintaan.create', compact('barang', 'pejabat'));
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
                'status' => 'Belum disetujui',
                'created_at' => $request->tanggal
            ]
        );

        $form = $request->volume;

        for ($i = 0; $i < count($form) - 1; $i++) {
            //    $s = Barang::find($request->barang[$i]);
            $volume = preg_replace('/[^\d]/', '', $request->volume[$i]);
            DetailPermintaan::create([
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
        $pengeluaran = Pengeluaran::where('id_permintaan', $id)->first();
        $detail_pengeluaran = DetailPengeluaran::where('id_pengeluaran', $pengeluaran->id)->get();
        return view('permintaan.detail.index', compact('permintaan', 'detail_permintaan', 'detail_pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $detail_permintaan = DetailPermintaan::where('id_permintaan', $id)->get();
        return view('permintaan.detail.verif', compact('permintaan', 'detail_permintaan'));
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
        $request->validate([
            'jumlah.*' => 'required|min:0|numeric'
        ]);

        $detail_permintaan = DetailPermintaan::where('id_permintaan', $id)->get();
        for ($i = 0; $i < count($request->jumlah); $i++) {
            if ($request->jumlah[$i] > $detail_permintaan[$i]->jumlah) {
                if ($request->jumlah[$i] > $detail_permintaan[$i]->barang->stok) {
                    return back()->with('fail', "Jumlah pengeluaran pada data ke " . ($i + 1) . " melebihi stok");
                } else {
                    return back()->with('fail', "Jumlah pengeluaran pada data ke " . ($i + 1) . " melebihi permintaan");
                }
            }
        }

        $permintaan = Permintaan::find($id);
        $permintaan->update([
            'status' => 'Disetujui'
        ]);

        Pengeluaran::create([
            'id_permintaan' => $id,
        ]);

        for ($i = 0; $i < count($request->jumlah); $i++) {
            DetailPengeluaran::create([
                'id_pengeluaran' => Pengeluaran::get()->last()->id,
                'id_barang' => $request->barang[$i],
                'jumlah' => $request->jumlah[$i] ,
            ]);
        }

        return redirect()->route('permintaan.index')->with('success', 'status permintaan dengan nomor ' . $permintaan
            ->nomor . ' telah disetujui');
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

    public function cetak(){
        
    }
}
