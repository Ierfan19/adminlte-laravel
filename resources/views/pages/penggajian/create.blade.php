@extends('layouts.main')
@section('content')

<section class="content">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('/penggajian/store')}}" method="post">
                  @csrf
              <div class="form-group d-flex">
                <div class="form-group col-md-2">
                    <label for="" class="form-label">No Slip</label>
                    <input type="text" name="no_slip" id="no_slip" value="{{$nomat}}" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="" class="form-label">Tgl Sekarang</label>
                    <input type="text" name="tgl" value="{{$tgl}}" id="" class="form-control">
                </div>
                <div class="form-group col-md-2 ">
                    <label for="" class="form-label">Bulan</label>
                    <input type="text" name="bln" value="{{$bln}}" id="" class="form-control">
                </div>
              </div>

              <div class="form-group col-md-2">
                <label for="" class="form-label">Nip</label>
                <input type="text" name="nip" id="nip" class="form-control" onkeyup="carinip()">
              </div>

              <table class="mb-3">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>Kode Jabatan</th>
                        <th>Kode Golongan</th>
                        <th>Status</th>
                        <th>Jumlah Anak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai"></td>
                        <td><input type="text" class="form-control" name="kode_jabatan" id="kode_jabatan"></td>
                        <td><input type="text" class="form-control" name="kode_golongan" id="kode_golongan"></td>
                        <td><input type="text" class="form-control" name="status" id="status"></td>
                        <td><input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak"></td>
                    </tr>
                </tbody>
              </table>
                
              <div class="form-group d-flex">
                <div class="form-group col-md-2">
                    <label for="" class="form-label">Kode Jabatan</label>
                    <input type="text" name="kode_jabatan" id="kode_jabatan" class="form-control" onclick="carijabatan()">
                </div>
                <div class="form-group col-md-2">
                    <label for="" class="form-label">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control">
                </div>
                <div class="form-group col-md-2 ">
                    <label for="" class="form-label">Gaji Pokok</label>
                    <input type="text" name="gapok" id="gapok" class="form-control">
                </div>
              </div>
              <div class="form-group d-flex">
                <div class="form-group col-md-2">
                    <label for="" class="form-label">Potongan</label>
                    <input type="text" name="potongan" id="potongan" class="form-control" onkeyup="caripotongan()">
                </div>
                <div class="form-group col-md-2">
                    <label for="" class="form-label">Gaji Bersih</label>
                    <input type="text" name="gaji_bersih" id="gaji_bersih" class="form-control">
                </div>
                <div class="form-group col-md-2 ">
                   <button>Simpan</button>
                </div>
              </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
    
    function carinip(){
        
        iddd = $('#nip').val()
          if (iddd==''){
            $('#nama_jabatan').val('')
          }
          $.ajax({
            url:"{{route('carinip')}}",
            type:"GET",
            dataType:"json",
            data:{
               id:$("#nip").val()
             },
             success:function(hasil){
              
                // alert('Data tidak di temukan 3')
                $('#nama_pegawai').val(hasil.data.nama_pegawai)
                $('#kode_jabatan').val(hasil.data.kode_jabatan)
                $('#kode_golongan').val(hasil.data.kode_golongan)
                $('#status').val(hasil.data.status)
                $('#jumlah_anak').val(hasil.data.jumlah_anak)
             }
  
         });
      }
      function carijabatan(){
        
        idd = $('#kode_jabatan').val()
          $.ajax({
            url:"{{route('carijabatan')}}",
            type:"GET",
            dataType:"json",
            data:{
               id:$("#kode_jabatan").val()
             },
             success:function(hasil){
              
                $('#nama_jabatan').val(hasil.data.nama_jabatan)
                $('#gapok').val(hasil.data.gapok)
             }
  
         });
      }
      function caripotongan(){
        var potongan = document.getElementById('potongan').value
        var gapok = document.getElementById('gapok').value

        var gasih = gapok - potongan
        $('#gaji_bersih').val(gasih)
      }
</script>
@endsection