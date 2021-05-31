@extends('layout/main')
@section('title','Data Pasien')
    

@section('breadcrumbs')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Pasien</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data</a></li>
          <li class="breadcrumb-item active">Pasien</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection
@section('content')

<a href="{{url('pasiens/create')}}" class="btn btn-primary mb-3"> 
<i class="fa fa-plus"></i> Tambah Data</a>

<a href="{{url('pasiens/trash')}}" class="btn btn-danger mb-3" type="submit">
    <i class="fa fa-trash"></i> Trash
</a>
     <!-- Main content -->
     <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg">
          
          @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
          @endif
          
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">keluhan</th>
                <th scope="col">Poli</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @foreach ($pasiens as $data)
            <tbody>
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->nomor_telepon}}</td>
                <td>{{$data->keluhan}}</td>
                <td>{{$data->poli->name}}</td>
                <td>
                  <a href="{{url('pasiens/' .$data->id)}}" class="btn btn-sm btn-primary">detail</a>
                  <a href="{{url('pasiens/' .$data->id. '/edit')}}" class="btn btn-sm btn-warning">edit</a>
                  <form action="{{url('pasiens/'.$data->id)}}" method="POST" onsubmit="return confirm('yakin hapus data ?')" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger">hapus</button>
                  </form>
                </td>
              </tr>
              
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  <!-- /.content -->
@endsection





   

 
