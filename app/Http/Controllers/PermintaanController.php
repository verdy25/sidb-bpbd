<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPengeluaran;
use App\DetailPermintaan;
use App\PejabatBarang;
use App\Pengeluaran;
use App\Permintaan;
use App\Http\Controllers\Helpers as help;
use PDF;

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
        $barang = Barang::where('stok', '>', 0)->get();
        // $barang = Barang::all();
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
                'nomor' => 'required|unique:permintaans,nomor',
                'perihal' => 'required',
                'barang.*' => 'required',
                'jumlah.*' => 'required'
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

        for ($i = 0; $i < count($form); $i++) {
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
        $detail_pengeluaran = [];
        if ($pengeluaran != null) {
            $detail_pengeluaran = DetailPengeluaran::where('id_pengeluaran', $pengeluaran->id)->get();
        }
        return view('permintaan.detail.index', compact('permintaan', 'detail_permintaan', 'detail_pengeluaran', 'pengeluaran'));
    }

    public function ubah($id)
    {
        $pejabat = PejabatBarang::all();
        $barang = Barang::all();
        $permintaan = Permintaan::findOrFail($id);
        $detail_permintaan = DetailPermintaan::where('id_permintaan', $id)->get();
        $pengeluaran = Pengeluaran::where('id_permintaan', $id)->first();
        $detail_pengeluaran = [];
        if ($pengeluaran != null) {
            $detail_pengeluaran = DetailPengeluaran::where('id_pengeluaran', $pengeluaran->id)->get();
        }
        return view('permintaan.detail.edit', compact('pejabat', 'barang', 'permintaan', 'detail_permintaan', 'detail_pengeluaran'));
    }

    public function update_permintaan(Request $request, $id)
    {
        // dd($request->all());
        $permintaan = Permintaan::findOrFail($id);
        $request->validate(
            [
                'kepada' => 'required',
                'pemohon' => 'required',
                'nomor' => "required|unique:permintaans,nomor, $id",
                'perihal' => 'required',
                'barang.*' => 'required',
                'jumlah.*' => 'required'
            ]
        );

        Permintaan::where('id', $id)->update(
            [
                'kepada' => $request->kepada,
                'pemohon' => $request->pemohon,
                'nomor' => $request->nomor,
                'perihal' => $request->perihal,
                'created_at' => $request->tanggal
            ]
        );

        $form = $request->volume;
        $detail_permintaan = DetailPermintaan::where('id_permintaan', $id)->get();
        for ($i = 0; $i < count($form); $i++) {
            $volume = preg_replace('/[^\d]/', '', $request->volume[$i]);
            if ( $i >= count($detail_permintaan)) {
                DetailPermintaan::create([
                    'id_permintaan' => $id,
                    'id_barang' => $request->barang[$i],
                    'jumlah' => $volume,
                ]);
            } else {
                DetailPermintaan::where('id', $detail_permintaan[$i]->id)->where('id_permintaan', $id)->update([
                    'id_barang' => $request->barang[$i],
                    'jumlah' => $volume,
                ]);
            }
        }
        return redirect()->route('permintaan.index')->with('success', 'Permintaan nomor '.$permintaan->nomor.' berhasil diubah');
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

    public function persetujuan_edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $detail_pengeluaran = DetailPengeluaran::where('id_pengeluaran', $id)->get();
        return view('persetujuan.edit', compact('pengeluaran', 'detail_pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store_persetujuan(Request $request, $id)
    {
        $request->validate([
            'jumlah.*' => 'required|min:0|numeric',
            'keterangan' => 'nullable'
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
            'status' => 'Disetujui',
        ]);

        Pengeluaran::create([
            'id_permintaan' => $id,
            'keterangan' => $request->keterangan
        ]);

        for ($i = 0; $i < count($request->jumlah); $i++) {
            DetailPengeluaran::create([
                'id_pengeluaran' => Pengeluaran::get()->last()->id,
                'id_barang' => $request->barang[$i],
                'jumlah' => $request->jumlah[$i],
                'created_at' => $permintaan->created_at,
            ]);
        }

        return redirect()->route('permintaan.index')->with('success', 'status permintaan dengan nomor ' . $permintaan
            ->nomor . ' telah disetujui');
    }

    public function persetujuan_update(Request $request, $id)
    {
        $request->validate([
            'jumlah.*' => 'required|numeric|min:0'
        ]);

        $detail_pengeluaran = DetailPengeluaran::where('id_pengeluaran', $id)->get();

        foreach ($detail_pengeluaran as $key => $value) {
            if ($request->jumlah[$key] > $detail_pengeluaran[$key]->barang->stok) {
                return back()->with('fail', "Jumlah yang disetujui pada data ke " . ($key + 1) . " melebihi stok");
            }
        }

        foreach ($detail_pengeluaran as $key => $value) {
            $detail_pengeluaran[$key]->update([
                'jumlah' => $request->jumlah[$key]
            ]);
        }

        return redirect()->route('permintaan.index')->with('success', 'jumlah persetujuan telah diperbarui');
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

    public function cetak($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $details = DetailPermintaan::where('id_permintaan', $id)->get();
        $tanggal = help::tgl_indo(date('Y-m-d'), $permintaan->created_at);

        $pdf = PDF::loadview('prints.permintaan', compact('permintaan', 'details', 'tanggal'));
        return $pdf->stream("permintaan.pdf", array("Attachment" => false));
    }
}
