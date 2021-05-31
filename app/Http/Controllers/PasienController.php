<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien/index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polis = Poli::all();

        return view('pasien/create', compact('polis'));
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
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'keluhan' => 'required',
            'poli_id' => 'required',
        ], [
            'name.required' => 'nama wajib di isi',
            'alamat.required' => 'alamat wajib di isi',
            'nomor_telepon.required' => 'nomor telepon wajib di isi',
            'keluhan.required' => 'keluhan wajib di isi',
            'poli_id.required' => 'poli wajib di isi',
        ]);

        Pasien::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'keluhan' => $request->keluhan,
            'poli_id' => $request->poli_id,

        ]);

        return redirect('pasiens')->with('status', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('pasien/show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $polis = Poli::all();
        return view('pasien/edit', compact('pasien', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'keluhan' => 'required',
            'poli_id' => 'required',
        ], [
            'name.required' => 'nama harus di isi',
            'alamat.required' => 'alamat harus di isi',
            'nomor_telepon.required' => 'nomor telepon harus di isi',
            'keluhan.required' => 'nomor telepon harus di isi',
            'poli_id.required' => 'poli harus di isi',

        ]);


        Pasien::where('id', $pasien->id)
            ->update(
                [
                    'name' => $request->name,
                    'alamat' => $request->alamat,
                    'nomor_telepon' => $request->nomor_telepon,
                    'keluhan' => $request->keluhan,
                    'poli_id' => $request->poli_id,

                ]
            );

        return redirect('pasiens')->with('status', 'data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        return redirect('pasiens')->with('status', 'data berhasil di hapus!!');
    }


    public function trash()
    {
        $pasiens = Pasien::onlyTrashed()->get();

        return view('pasien/trash', compact('pasiens'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            Pasien::onlyTrashed()->where('id', $id)->restore();
        } else {
            Pasien::onlyTrashed()->restore();
        }
        return redirect('pasiens/trash')->with('status', 'data berhasil di restore');
    }

    public function delete($id = null)
    {
        if ($id = null) {
            Pasien::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            Pasien::onlyTrashed()
                ->forceDelete();
        }
        return redirect('pasiens/trash')->with('status', 'data berhasil di hapus');
    }
}
