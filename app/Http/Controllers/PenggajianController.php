<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Master_gaji;
use App\Models\MasterGaji;
use Carbon;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function nomat(){
        
      $tgl = date('y-m-d');
      $number = Master_gaji::where('created_at', 'like', '%'.$tgl.'%')->count();
      $angka = $number +1;
      $codes = str_pad($angka, 1, rand(11,99),STR_PAD_LEFT);
      $code = 'PGJN-'.date('ymd').$codes;
      return $code;
    }
    public function index()
    {
        $dataParameter['gaji'] = Master_gaji::with('pegawai')->get();
        return view('pages.penggajian.index', $dataParameter);
    }
    function carinip(){
        $id = Request::get('id');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Pegawai::with('Jabatan', 'Golongan', 'Master_gaji')->where('nip','=',$id)->first();
        if (empty($isi)) {
            $data['val']   = 0;
        }else{
            $data['val']   = 1;
            $data['data']   = $isi;

        }
        
        return Response($data);
        }
    }

    function carijabatan(){
        $id = Request::get('id');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Jabatan::where('kode_jabatan','=',$id)->first();
        if (empty($isi)) {
            $data['val']   = 0;
        }else{
            $data['val']   = 1;
            $data['data']   = $isi;

        }
        
        return Response($data);
        }
    }
    function caripotongan(){
        $id = Request::get('id');
        if ($id=='') {
            $data['val']    = 2;
        }else{
            $isi = Master_gaji::where('potongan','=',$id)->first();
        if (empty($isi)) {
            $data['val']   = 0;
        }else{
            $data['val']   = 1;
            $data['data']   = $isi;

        }
        
        return Response($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataParameter['nomat'] = self::nomat();
        $dataParameter['tgl'] = date('d');
        $dataParameter['bln'] = date('M');
        return view('pages.penggajian.create', $dataParameter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $bulan = Request::get('bln');
        $nip = Request::get('nip');
        $potongan = Request::get('potongan');
        $gaji_bersih = Request::get('gaji_bersih');
        $no_slip = Request::get('no_slip');

        $mastergaji = new Master_gaji();
        $mastergaji->bulan = $bulan;
        $mastergaji->nip = $nip;
        $mastergaji->potongan = $potongan;
        $mastergaji->gaji_bersih = $gaji_bersih;
        $mastergaji->no_slip = self::nomat();
        $mastergaji->save();
        return redirect('penggajian');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
