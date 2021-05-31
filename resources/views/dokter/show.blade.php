@extends('layout/main')
@section('title','detail data')
    

@section('breadcrumbs')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Data Dokter</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dokter</a></li>
          <li class="breadcrumb-item active">detail</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection

@section('content')
     <!-- Main content -->
     <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nama</th>
                 <td>{{$dokter->name}}</td>
                </tr>

                  <tr>
                    <th>Poli</th>
                   <td>{{$dokter->poli->name}}</td>
                  </tr>

                <tr>
                  <th>Alamat</th>
                 <td>{{$dokter->alamat}}</td>
                </tr>
                <tr>
                  <th>Nomor Telepon</th>
                 <td>{{$dokter->nomor_telepon}}</td>
                </tr>
              
                <tr>
                  <th>Tanggal Daftar</th>
                 <td>{{$dokter->created_at}}</td>
                </tr>
                
              </tbody>
            </div>  
            <a href="{{url('dokters')}}" class="btn btn-primary mb-3">Back</a>
          </div>
        </div>
        <!-- /.content -->
        @endsection





   

 
