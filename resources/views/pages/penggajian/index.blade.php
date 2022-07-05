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
              <a href="{{url('/penggajian/create')}}" class="btn btn-info">Tambah</a>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table mb-3">
                <thead>
                    <tr>
                        <th>No_Slip</th>
                        <th>Nip</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Jabatan</th>
                        <th>Nama Golongan</th>
                        <th>Gapok</th>
                        <th>Gasih</th>
                        <th>Potongan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gaji as $row)
                    <tr>
                        <td>{{$row->no_slip}}</td>
                        <td>{{$row->nip}}</td>
                        <td>{{$row->Pegawai->nama_pegawai}}</td>
                        <td>{{$row->Pegawai->Jabatan->nama_jabatan}}</td>
                        <td>{{$row->Pegawai->Golongan->nama_golongan}}</td>
                        <td>{{$row->Pegawai->Jabatan->gapok}}</td>
                        <td>{{$row->gaji_bersih}}</td>
                        <td>{{$row->potongan}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
                

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
@endsection