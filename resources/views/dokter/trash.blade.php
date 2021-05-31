@extends('layout/main')
@section('title','Trash')
    

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

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
     <!-- Main content -->
     <div class="containter-fluid">
      <div class="col-sm">
          <div class="card ">
            <div class="card-header">
              <div class="pull-left">
                <strong>Data Program yang dihapus</strong>
              </div>
              <div class="pull-right float-right">
                <a href="{{url('dokters/delete')}}" class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i> Delete All
                </a>
                <a href="{{url('dokters/restore')}}" class="btn btn-sm btn-info" type="submit">
                  <i class="fa fa-undo"></i> Restore All
                </a>
                <a href="{{url('dokters/')}}" class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-chevron-left"></i> Back
                </a>
              </div>
            </div>
          </div>
       </div>
    </div>
   
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Poli</th>
          <th scope="col">Alamat</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($dokters->count() > 0)
            @foreach ($dokters as $data)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$data->name}}</td>
              <td>{{$data->poli->name}}</td>
              <td>{{$data->alamat}}</td>
              <td>{{$data->nomor_telepon}}</td>
              <td>
                <a href="{{url('dokters/restore/' .$data->id)}}" class="btn btn-sm btn-info">Restore</a>
                <a href="{{url('dokters/delete/' .$data->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('yakin hapus data ?')">Delete</a>
              </td>
            </tr>
         @endforeach
        
          @else
            <tr>
              <td colspan="5" class="text-center">Data Kosong</td>
            </tr>
        @endif
  <!-- /.content -->
@endsection





   

 
