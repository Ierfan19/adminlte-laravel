<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataParameter['jabatan'] = Jabatan::all();
        return view('pages/jabatan/index', $dataParameter);
    }
    public function read()
    {
        $dataParameter['jabatan'] = Jabatan::all();
        return view('pages/jabatan/read', $dataParameter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/jabatan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_jabatan = $request->kode_jabatan;
        $nama_jabatan = $request->nama_jabatan;
        $gapok = $request->gapok;
        $tunjangan_jabatan = $request->tunjangan_jabatan;

        $jabatan = new Jabatan();
        $jabatan->kode_jabatan = $kode_jabatan;
        $jabatan->nama_jabatan = $nama_jabatan;
        $jabatan->gapok = $gapok;
        $jabatan->tunjangan_jabatan = $tunjangan_jabatan;
        $jabatan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataParameter['edit_jabatan'] = Jabatan::find($id);
        return view('pages/jabatan/edit', $dataParameter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request)
    {
        $kode_jabatan = $request->kode_jabatan;
        $nama_jabatan = $request->nama_jabatan;
        $gapok = $request->gapok;
        $tunjangan_jabatan = $request->tunjangan_jabatan;

        $jabatan = Jabatan::find($kode_jabatan);
        $jabatan->kode_jabatan = $kode_jabatan;
        $jabatan->nama_jabatan = $nama_jabatan;
        $jabatan->gapok = $gapok;
        $jabatan->tunjangan_jabatan = $tunjangan_jabatan;
        $jabatan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
    }
}
