<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataParameter['golongan'] = Golongan::all();
        return view('pages/golongan/index', $dataParameter);
    }
    public function read()
    {
        $dataParameter['golongan'] = Golongan::all();
        return view('pages/golongan/read', $dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/golongan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_golongan = $request->kode_golongan;
        $nama_golongan = $request->nama_golongan;
        $tunjangan_suami_istri = $request->tunjangan_suami_istri;
        $tunjangan_anak = $request->tunjangan_anak;
        $uang_makan = $request->uang_makan;
        $uang_lembur = $request->uang_lembur;
        $askes = $request->askes;

        $golongan = new Golongan();
        $golongan->kode_golongan = $kode_golongan;
        $golongan->nama_golongan = $nama_golongan;
        $golongan->tunjangan_suami_istri = $tunjangan_suami_istri;
        $golongan->tunjangan_anak = $tunjangan_anak;
        $golongan->uang_makan = $uang_makan;
        $golongan->uang_lembur = $uang_lembur;
        $golongan->askes = $askes;
        $golongan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataParameter['editgolongan'] = Golongan::find($id);
        return view('pages/golongan/edit', $dataParameter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request)
    {
        $kode_golongan = $request->kode_golongan;
        $nama_golongan = $request->nama_golongan;
        $tunjangan_suami_istri = $request->tunjangan_suami_istri;
        $tunjangan_anak = $request->tunjangan_anak;
        $uang_makan = $request->uang_makan;
        $uang_lembur = $request->uang_lembur;
        $askes = $request->askes;

        $golongan = Golongan::find($kode_golongan);
        $golongan->kode_golongan = $kode_golongan;
        $golongan->nama_golongan = $nama_golongan;
        $golongan->tunjangan_suami_istri = $tunjangan_suami_istri;
        $golongan->tunjangan_anak = $tunjangan_anak;
        $golongan->uang_makan = $uang_makan;
        $golongan->uang_lembur = $uang_lembur;
        $golongan->askes = $askes;
        $golongan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $golongan = Golongan::find($id);
        $golongan->delete();
    }
}
