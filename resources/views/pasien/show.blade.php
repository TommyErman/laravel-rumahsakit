@extends('layout/main')
@section('title','dashboard')
    

@section('breadcrumbs')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="col-lg">
             <!-- Main content -->
     <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nama</th>
                 <td>{{$pasien->name}}</td>
                </tr>

                <tr>
                  <th>Alamat</th>
                 <td>{{$pasien->alamat}}</td>
                </tr>

                <tr>
                  <th>Nomor Telepon</th>
                 <td>{{$pasien->nomor_telepon}}</td>
                </tr>

                <tr>
                  <th>keluhan</th>
                 <td>{{$pasien->keluhan}}</td>
                </tr>
                
                  <tr>
                    <th>Poli</th>
                   <td>{{$pasien->poli->name}}</td>
                  </tr>
              
                <tr>
                  <th>Tanggal Daftar</th>
                 <td>{{$pasien->created_at}}</td>
                </tr>
                
              </tbody>
            </div>  
            <a href="{{url('pasiens')}}" class="btn btn-primary mb-3">Back</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  <!-- /.content -->
@endsection





   

 
