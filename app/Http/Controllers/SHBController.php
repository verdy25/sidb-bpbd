<?php

namespace App\Http\Controllers;

use Session;
use DataTables;
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

    public function shbList(){
        return DataTables::of(SHBelanja::all())->make(true);
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
