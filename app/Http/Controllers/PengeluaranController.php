<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPengeluaran;
use App\PejabatBarang;
use App\Pengeluaran;
use App\Permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers as help;
use App\SHBelanja;
use PDF;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::orderBy('id', 'DESC')->get();
        return view('pengeluaran.index', compact('pengeluarans'));
    }

    public function sppb($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pejabats = PejabatBarang::all();
        return view('pengeluaran.sppb.edit', compact('pejabats', 'pengeluaran'));
    }

    public function bpbg($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pejabats = PejabatBarang::all();
        return view('pengeluaran.bpbg.edit', compact('pejabats', 'pengeluaran'));
    }

    public function sppb_create($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pejabats = PejabatBarang::all();
        return view('pengeluaran.sppb.create', compact('pejabats', 'pengeluaran'));
    }

    public function bpbg_create($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pejabats = PejabatBarang::all();
        return view('pengeluaran.bpbg.create', compact('pejabats', 'pengeluaran'));
    }

    public function sppb_store(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required',
            'kepada' => 'required',
            'dari' => 'required',
            'penandatangan' => 'required'
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update([
            'nomor_keluar' => $request->nomor,
            'kepada' => $request->kepada,
            'dari' => $request->dari,
            'kepada_user' => $request->penandatangan
        ]);

        Permintaan::where('id', $pengeluaran->id_permintaan)->update([
            'status' => 'Surat perintah pengeluaran barang telah keluar'
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Surat Perintah Pengeluaran / Penyaluran Barang pada permintaan ' . $pengeluaran->permintaan->nomor . ' telah dibuat');
    }

    public function bpbg_store(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required',
            'pejabat' => 'required'
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update([
            'nomor_ambil' => $request->nomor,
            'penyerah_user' => $request->pejabat
        ]);

        Permintaan::where('id', $pengeluaran->id_permintaan)->update([
            'status' => 'Barang telah diambil'
        ]);

        $detail_pengeluaran = DetailPengeluaran::where('id_pengeluaran', $id)->get();
        foreach ($detail_pengeluaran as $key => $value) {
            Barang::where('kode', $value->barang->kode)->update([
                'stok' => $value->barang->stok - $value->jumlah
            ]);
        }

        return redirect()->route('pengeluaran.index')->with('success', 'Bukti Penngambilan Barang dari Gudang pada permintaan ' . $pengeluaran->permintaan->nomor . ' telah dibuat');
    }

    public function sppb_update(Request $request, $id)
    {
        $request->validate([
            'kepada' => 'required',
            'dari' => 'required',
            'pejabat' => 'required',
            'nomor' => 'required'
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update([
            'kepada' => $request->kepada,
            'dari' => $request->dari,
            'kepada_user' => $request->pejabat,
            'nomor_keluar' => $request->nomor
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Surat Perintah Pengeluaran / Penyaluran Barang pada permintaan ' . $pengeluaran->permintaan->nomor . ' telah diubah');
    }

    public function bpbg_update(Request $request, $id)
    {
        $request->validate([
            'pejabat' => 'required'
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update([
            'penyerah_user' => $request->pejabat
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Bukti Penngambilan Barang dari Gudang pada permintaan ' . $pengeluaran->permintaan->nomor . ' telah diubah');
    }

    public function sppb_print($id)
    { 
        $pengeluaran = Pengeluaran::findOrFail($id);
        $details = DetailPengeluaran::where('id_pengeluaran', $id)->get();
        $tanggal = help::tgl_indo(date('Y-m-d'), $pengeluaran->created_at);

        $pdf = PDF::loadview('prints.sppb', compact('pengeluaran', 'details', 'tanggal'));
        return $pdf->stream("surat-perintah-pengeluaran-penyaluran-barang.pdf", array("Attachment" => false));
    }

    public function bpbg_print($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $details = DetailPengeluaran::where('id_pengeluaran', $id)->get();
        $tanggal = help::tgl_indo(date('Y-m-d'), $pengeluaran->created_at);
        $harga_satuan = [];
        $jumlah = [];

        foreach ($details as $key => $value) {
            $shb = SHBelanja::where('kode_barang', $value->barang->kode)->first();
            $harga_satuan[$key] = $shb->harga;
            $jumlah[$key] = $shb->harga * $value->jumlah;
        }

        $pdf = PDF::loadview('prints.bpbg', compact('pengeluaran', 'details', 'tanggal', 'harga_satuan', 'jumlah'));
        return $pdf->stream("bukti-pengambilan-barang-dari-gudang.pdf", array("Attachment" => false));
     }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_keluar' => 'nullable'
        ]);

        Pengeluaran::where('id', $id)->update([
            'nomor_keluar' => $request->nomor_keluar
        ]);

        return back()->with('success', 'Berhasil menambah nomor surat perintah pengeluaran / penyaluran barang');
    }

    public function bukti_ambil(Request $request, $id)
    {
        $request->validate([
            'nomor_ambil' => 'nullable'
        ]);

        Pengeluaran::where('id', $id)->update([
            'nomor_ambil' => $request->nomor_ambil
        ]);

        return back()->with('success', 'Berhasil menambah nomor bukti pengambilan barang dari gudang');
    }
}
