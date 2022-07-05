<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataParameter['pegawai'] = Pegawai::all();
        return view('pages/pegawai/index', $dataParameter);
    }
    public function read()
    {
        $dataParameter['pegawai'] = Pegawai::all();
        return view('pages/pegawai/read', $dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataParameter['kodejabatan'] = Jabatan::all();
        $dataParameter['kodegolongan'] = Golongan::all();
        return view('pages/pegawai/create', $dataParameter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nip = $request->nip;
        $nama_pegawai = $request->nama_pegawai;
        $kode_jabatan = $request->kode_jabatan;
        $kode_golongan = $request->kode_golongan;
        $status = $request->status;
        $jumlah_anak = $request->jumlah_anak;

        $pegawai = new Pegawai();
        $pegawai->nip = $nip;
        $pegawai->nama_pegawai = $nama_pegawai;
        $pegawai->kode_jabatan = $kode_jabatan;
        $pegawai->kode_golongan = $kode_golongan;
        $pegawai->status = $status;
        $pegawai->jumlah_anak = $jumlah_anak;
        $pegawai->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $dataParameter['kodejabatan'] = Jabatan::all();
        $dataParameter['kodegolongan'] = Golongan::all();
        $dataParameter['editpegawai'] = Pegawai::find($id);
        return view('pages/pegawai/edit', $dataParameter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request)
    {
        $nip = $request->nip;
        $nama_pegawai = $request->nama_pegawai;
        $kode_jabatan = $request->kode_jabatan;
        $kode_golongan = $request->kode_golongan;
        $status = $request->status;
        $jumlah_anak = $request->jumlah_anak;

        $pegawai = Pegawai::find($nip);
        $pegawai->nip = $nip;
        $pegawai->nama_pegawai = $nama_pegawai;
        $pegawai->kode_jabatan = $kode_jabatan;
        $pegawai->kode_golongan = $kode_golongan;
        $pegawai->status = $status;
        $pegawai->jumlah_anak = $jumlah_anak;
        $pegawai->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
    }
}
