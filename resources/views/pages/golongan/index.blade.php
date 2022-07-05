@extends('layouts.main')
@push('style-index')
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
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
              <button class="btn btn-success" onclick="create()">Tambah</button>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Golongan</th>
                    <th>Nama Golongan</th>
                    <th>Tunjangan Suami Istri</th>
                    <th>Tunjangan Anak</th>
                    <th>Uang Makan</th>
                    <th>Uang Lembur</th>
                    <th> Askes</th>
                    <th> Action</th>
                  </tr>
                  </thead>
                  <tbody class="text-white" id="read">
                    <div></div>
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


<!-- Modal -->
<div class="modal fade" id="golongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judul"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="page"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script-index')
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('asset/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
            <script>
                $(function () {
                    $("#example1").DataTable({
                    "responsive": true, "lengthChange": true, "autoWidth": true,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    
                });
                $(document).ready(function(){
                    read();
                });
                    function read(){
                        $.get("{{url('/golongan/read')}}",{},function(data,status){
                            $('#read').html(data);
                        });
                    }
                    function create(){
                        $.get("{{url('/golongan/create')}}",{},function(data,status){
                          $('#judul').html('Tambah Data');
                            $('#page').html(data);
                             $('#golongan').modal('show');
                        });
                    }
                    function store(){
                        var kode_golongan = $('#kode_golongan').val();
                        var nama_golongan = $('#nama_golongan').val();
                        var tunjangan_suami_istri = $('#tunjangan_suami_istri').val();
                        var tunjangan_anak = $('#tunjangan_anak').val();
                        var uang_makan = $('#uang_makan').val();
                        var uang_lembur = $('#uang_lembur').val();
                        var askes = $('#uang_lembur').val();
                        $.ajax({
                            type: "get",
                            url:"{{url('golongan/store')}}",
                            data:{
                                kode_golongan: kode_golongan,
                                nama_golongan: nama_golongan,
                                tunjangan_suami_istri: tunjangan_suami_istri,
                                tunjangan_anak: tunjangan_anak,
                                uang_makan: uang_makan,
                                uang_lembur: uang_lembur,
                                askes: askes
                            },
                            success:function(data){
                                $('.btn-close').click();
                                read()

                            }
                        })
                    }
                    
                    function show(kode_golongan){ 
                        $.get("{{url('/golongan/edit')}}/" + kode_golongan,{},function(data,status){
                          $('#judul').html('Edit Data');
                            $('#page').html(data);
                             $('#golongan').modal('show');
                        });
                    }
                    
                    function update(){
                        var kode_golongan = $('#kode_golongan').val();
                        var nama_golongan = $('#nama_golongan').val();
                        var tunjangan_suami_istri = $('#tunjangan_suami_istri').val();
                        var tunjangan_anak = $('#tunjangan_anak').val();
                        var uang_makan = $('#uang_makan').val();
                        var uang_lembur = $('#uang_lembur').val();
                        var askes = $('#uang_lembur').val();
                        $.ajax({
                            type: "get",
                            url:"{{url('golongan/update')}}",
                            data:{
                                kode_golongan: kode_golongan,
                                nama_golongan: nama_golongan,
                                tunjangan_suami_istri: tunjangan_suami_istri,
                                tunjangan_anak: tunjangan_anak,
                                uang_makan: uang_makan,
                                uang_lembur: uang_lembur,
                                askes: askes
                            },
                            success:function(data){
                                $('.btn-close').click();
                                read()

                            }
                        })
                    }
                    function destroy(kode_golongan){
                        if (confirm("Are you sure?")) {
                        var nama_golongan = $('#nama_golongan').val();
                        var tunjangan_suami_istri = $('#tunjangan_suami_istri').val();
                        var tunjangan_anak = $('#tunjangan_anak').val();
                        var uang_makan = $('#uang_makan').val();
                        var uang_lembur = $('#uang_lembur').val();
                        var askes = $('#uang_lembur').val();
                        $.ajax({
                            type: "get",
                            url:"{{url('golongan/delete')}}/" + kode_golongan,
                            data:{
                                nama_golongan: nama_golongan,
                                tunjangan_suami_istri: tunjangan_suami_istri,
                                tunjangan_anak: tunjangan_anak,
                                uang_makan: uang_makan,
                                uang_lembur: uang_lembur,
                                askes: askes
                            },
                            success:function(data){
                                $('.btn-close').click();
                                read()

                            }
                        })
                            }
                            return false;
                    }
            </script>
@endpush