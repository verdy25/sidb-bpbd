<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailNota;
use App\Nota;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        $notas = Nota::all();
        return view('nota', compact('notas', 'barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'tanggal' => 'required',
        //     'nota' => 'nullable|unique:nota,nota'
        // ]);

        dd($request->dynamic_form);
        $form = $request->dynamic_form['dynamic_form'];
        foreach ($form as $key => $value) {
            $request->validate([
                "dynamic_form[dynamic_form][$key][jumlah]" => 'required|numeric|min:0',
                "dynamic_form[dynamic_form][$key][barang]" => 'required',
                "dynamic_form[dynamic_form][$key][harga]" => 'required|numeric|min:0',
            ]); 
        }

        if ($request->nota == null) {
            Nota::create([
                'created_at' => $request->tanggal,
                'nota' => Nota::get()->last()->id + 1
            ]);
        } else {
            Nota::create([
                'created_at' => $request->tanggal,
                'nota' => $request->nota
            ]);
        }

        foreach ($form as $key => $value) {
            DetailNota::create([
                'id_barang' => $form[$key]['barang'],
                'jumlah' => $request->dynamic_form['dynamic_form'][$key]['jumlah'],
                'harga' => $request->dynamic_form['dynamic_form'][$key]['harga'],
                'id_nota' => Nota::get()->last()->id
            ]);

            $barang = Barang::find($form[$key]['barang']);
            Barang::where('id', $form[$key]['barang'])->update([
                'stok' => $barang->stok + $request->dynamic_form['dynamic_form'][$key]['jumlah']
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
        $details = DetailNota::where('id_nota', $id)->get();
        $total = 0;
        foreach ($details as $value) {
            $total = $total + ($value->jumlah * $value->harga);
        }
        return view('detailnota', compact('details', 'nota', 'total'));
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
    public function update(Request $request, Nota $nota)
    {
        //
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

    public function detailnota($id)
    {
        $nota = DetailNota::find($id);
        return view('detailnotaedit', compact('nota'));
    }
}
