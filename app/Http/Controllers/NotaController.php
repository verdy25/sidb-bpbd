<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailNota;
use App\Nota;
use App\PejabatBarang;
use App\SHBelanja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::all();
        return view('nota.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shb = SHBelanja::all();
        $pejabat = PejabatBarang::all();
        return view('nota.create', compact('shb', 'pejabat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'no_nota' => 'required',
            'pihak_ketiga' => 'required',
            'nama_perwakilan' => 'required',
            'jabatan_perwakilan' => 'required',
            'program' => 'required',
            'kegiatan' => 'nullable',
            'penanda_tangan' => 'required',
            'tanggal' => 'required',
            'barang' => 'required',
            'volume' => 'required',
            'harga' => 'required'
        ]);

        Nota::create([
            'no_nota' => $request->no_nota,
            'pihak_ketiga' => $request->pihak_ketiga,
            'nama_perwakilan' => $request->nama_perwakilan,
            'jabatan_perwakilan' => $request->jabatan_perwakilan,
            'program' => $request->program,
            'kegiatan' => $request->kegiatan,
            'penanda_tangan' => $request->penanda_tangan,
            'created_at' => $request->tanggal,
            'status' => 'Belum disahkan'
        ]);

        $form = $request->volume;
        for ($i = 0; $i < count($form) - 1; $i++) {
            $s = SHBelanja::find($request->barang[$i]);
            $barang = Barang::where('kode', $s->kode_barang)->first();
            if ($barang == null) {
                Barang::create([
                    'kode' => $s->kode_barang,
                    'nama' => $s->nama_barang,
                    'spesifikasi' => $s->spesifikasi,
                    'satuan' => $s->satuan,
                    'stok' => 0
                ]);
            } else { }
        }

        for ($i = 0; $i < count($form) - 1; $i++) {
            $s = SHBelanja::find($request->barang[$i]);
            $volume = preg_replace('/[^\d]/', '', $request->volume[$i]);
            $harga = preg_replace('/[^\d]/', '', $request->harga[$i]);
            DetailNota::create([
                'nota_id' =>  Nota::get()->last()->id,
                'kode_barang' => $s->kode_barang,
                'volume' => $volume,
                'harga' => $harga
            ]);

            $barang = Barang::where('kode', $s->kode_barang)->first();
            $barang->update([
                'stok' => $barang->stok + $volume,
            ]);
        }

        return redirect()->route('nota.index')->with('success', 'Berhasil menambahkan nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::findOrFail($id);
        $details = DetailNota::where('nota_id', $id)->get();
        $pejabat = PejabatBarang::all();
        $total = 0;
        $jumlah = [];
        foreach ($details as $key => $value) {
            $jumlah[$key] = $value->volume * $value->harga;
            $total = $total + ($value->volume * $value->harga);
        }
        return view('nota.detail.index', compact('details', 'nota', 'total', 'jumlah', 'pejabat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
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
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'penerima' => 'required'
        ]);

        Nota::where('id', $id)->update([
            'penanda_tangan' => $request->penerima
        ]);

        return back()->with('success', 'Penerima berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }

    public function cetak($id)
    {
        $nota = Nota::findOrFail($id);
        $details = DetailNota::where('nota_id', $id)->get();
        $total = 0;
        $jumlah = [];
        foreach ($details as $key => $value) {
            $jumlah[$key] = $value->volume * $value->harga;
            $total = $total + ($value->volume * $value->harga);
        }

        $pdf = PDF::loadview('prints.pengajuan', ['nota' => $nota, 'details' => $details, 'total' => $total, 'jumlah' => $jumlah]);
        return $pdf->stream("pengajuan.pdf", array("Attachment" => false));
    }

    public function loadDataSHB(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $cari = $request->q;
            $data = SHBelanja::select('id', 'nama_barang')->where('nama_barang', 'LIKE', '%'.$cari.'%')->get();
        }
        return response()->json($data);
    }
}
