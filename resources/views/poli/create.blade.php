@extends('layout/main')
@section('title','dashboard')
    

@section('breadcrumbs')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Data Poli</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Poli</a></li>
          <li class="breadcrumb-item active">Tambah</li>
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
          <form action="{{url('polis')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nama">Nama Poli</label>
              <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Silakan Masukan nama poli">

              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  <!-- /.content -->
@endsection





   

 
