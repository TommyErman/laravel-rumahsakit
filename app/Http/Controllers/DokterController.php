<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::all();
        // $dokters = Dokter::with('poli');

        return view('dokter/index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polis = Poli::all();
        return view('dokter/create', compact('polis'));
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
            'name' => 'required',
            'poli_id' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ], [
            'name.required' => 'nama harus di isi',
            'poli_id.required' => 'poli harus di isi',
            'alamat.required' => 'alamat harus di isi',
            'nomor_telepon.required' => 'nomor telepon harus di isi',

        ]);


        Dokter::create([
            'name' => $request->name,
            'poli_id' => $request->poli_id,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon

        ]);


        return redirect('dokters')->with('status', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        return view('dokter/show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        $polis = Poli::all();
        return view('dokter/edit', compact('dokter', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {

        $request->validate([
            'name' => 'required',
            'poli_id' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ], [
            'name.required' => 'nama harus di isi',
            'poli_id.required' => 'poli harus di isi',
            'alamat.required' => 'alamat harus di isi',
            'nomor_telepon.required' => 'nomor telepon harus di isi',

        ]);


        Dokter::where('id', $dokter->id)
            ->update(
                [
                    'name' => $request->name,
                    'poli_id' => $request->poli_id,
                    'alamat' => $request->alamat,
                    'nomor_telepon' => $request->nomor_telepon

                ]
            );

        return redirect('dokters')->with('status', 'data berhasil di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        Dokter::destroy($dokter->id);
        return redirect('dokters')->with('status', 'data berhasil di hapus!!');
    }


    public function trash()
    {
        $dokters = Dokter::onlyTrashed()->get();

        return view('dokter/trash', compact('dokters'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            Dokter::onlyTrashed()->where('id', $id)->restore();
        } else {
            Dokter::onlyTrashed()->restore();
        }
        return redirect('dokters/trash')->with('status', 'data berhasil di restore');
    }


    public function delete($id = null)
    {
        if ($id = null) {
            $dokters = Dokter::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $dokters = Dokter::onlyTrashed()
                ->forceDelete();
        }
        return redirect('dokters/trash')->with('status', 'data berhasil di hapus');
    }
}
