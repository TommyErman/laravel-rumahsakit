@extends('layout/main')
@section('title','Data Poli')
    

@section('breadcrumbs')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Poli</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Poli</a></li>
          <li class="breadcrumb-item active">Data Poli</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection

@section('content')
<a href="{{url('polis/create')}}" class="btn btn-primary mb-3">+ Tambah Data</a>
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
                <th scope="col">Nama Poli</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @foreach ($polis as $data)
            <tbody>
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->name}}</td>
                <td>
                  <a href="{{url('polis/' .$data->id)}}" class="btn btn-sm btn-primary">detail</a>
                  <a href="{{url('polis/' .$data->id. '/edit')}}" class="btn btn-sm btn-warning">edit</a>
                  <form action="{{url('polis/'.$data->id)}}" method="POST" onsubmit="return confirm('yakin hapus data ?')" class="d-inline">
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






   

 
