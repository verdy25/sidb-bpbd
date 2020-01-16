<?php

namespace App\Http\Controllers;

use Session;
use App\Imports\SHBImport;
use App\SHBelanja;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SHBController extends Controller
{

    public function index()
    {
        $shb = SHBelanja::all();
        return view('shbelanja.index', compact('shb'));
    }

    public function suku_cadang()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.17.01.02%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function bahan()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.17.01.01%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function natura()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.17.01.07%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function alat_besar()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.01%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function alat_angkutan()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.02%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function alat_bengkel()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.03%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function alat_kantor()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.05%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function alat_studio()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.06%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function komputer()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.10%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function pertanian()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.32.%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function obat()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.17.01.04%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function buku()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '1.35.01.01%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function honor()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '2001%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function biaya()
    {
        $shb = SHBelanja::where('kode_barang', 'like', '21.01%')
                ->get();
        return view('shbelanja.index', compact('shb'));
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        if ($request) {
            // menangkap file excel
            $file = $request->file('file');

            // membuat nama file unik
            $nama_file = rand() . $file->getClientOriginalName();
            $nama_file_no_space = str_replace(' ', '', $nama_file);

            // upload ke folder file_shb di dalam folder public
            $file->move('file_shb', $nama_file_no_space);

            // import data
            Excel::import(new SHBImport, public_path('/file_shb/' . $nama_file_no_space));

            // notifikasi dengan session
            Session::flash('success', 'Data Standart Satuan Harga Belanja Berhasil Diimport!');

            // alihkan halaman kembali
            return redirect()->route('shb.index');
        } else { 
            // notifikasi dengan session
            Session::flash('error', 'Data Standart Satuan Harga Belanja Gagal Diimport!');

            // alihkan halaman kembali
            return redirect()->route('shb.index');
        }
    }
}
