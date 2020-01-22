<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\PejabatBarang;
use Illuminate\Http\Request;

class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pejabats = PejabatBarang::all();
        $bidangs = Bidang::all();
        return view('pejabat.index', compact('pejabats', 'bidangs'));
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
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'id_bidang' => 'nullable'
        ]);

        PejabatBarang::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'id_bidang' => $request->bidang
        ]);

        return redirect()->route('pejabat.index')->with('success', "Pejabat baru $request->nama berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pejabat = PejabatBarang::find($id);
        $bidangs = Bidang::all();
        return view('pejabat.edit', compact('pejabat', 'bidangs'));
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
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required'
        ]);

        PejabatBarang::where('id', $id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'id_bidang' => $request->bidang
        ]);
        return redirect()->route('pejabat.index')->with('success', "Data pejabat $request->nama telah diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PejabatBarang::destroy($id);
        return redirect()->route('pejabat.index')->with('success', 'Data berhasil dihapus');
    }
}
