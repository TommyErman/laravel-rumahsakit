<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polis = Poli::all();

        return view('poli/index', compact('polis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli/create');
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
            'name' => 'required'
        ], [
            'name.required' => 'Nama poli harus diisi'
        ]);

        Poli::create([
            'name' => $request->name
        ]);
        return redirect('polis')->with('status', 'data berhasil di tambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        return view('poli/show', compact('poli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(Poli $poli)
    {
        $polis = Poli::all();
        return view('poli/edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama poli harus diisi'
        ]);

        Poli::where('id', $poli->id)
            ->update(
                [
                    'name' => $request->name

                ]
            );

        return redirect('polis')->with('status', 'data berhasil di update!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poli $poli)
    {
        // cara 1
        $poli->delete();
        return redirect('polis')->with('status', 'data berhasil di hapus!!!');
    }
}
