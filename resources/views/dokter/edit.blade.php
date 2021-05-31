@extends('layout/main')
@section('title','Edit Data Dokter')
    

@section('breadcrumbs')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Data Dokter</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dokter</a></li>
          <li class="breadcrumb-item active">Edit</li>
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
          <form action="{{url('dokters/' .$dokter->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="nama" value="{{ old('name' ,$dokter->name) }}">
             
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            <div class="form-group">
              <label for="name">Poli</label>
              <select class="form-control @error('poli_id') is-invalid @enderror" id="poli_id" name="poli_id">
                  <option value="">- pilih -</option>
                  @foreach ($polis as $data)
                  <option value="{{$data->id}}" {{old('poli_id') == $data->id ? 'selected' :null}}>{{$data->name}}</option>
                  @endforeach
              </select>
  
              @error('poli_id')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="Alamat">Alamat</label>
              <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="alamat" value="{{ old('alamat' ,$dokter->alamat) }}">
              @error('alamat')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>
            <div class="form-group">
              <label for="Nomor Telepon">Nomor Telepon</label>
              <input type="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" placeholder="nomor telepon" value="{{ old('nomor_telepon' ,$dokter->nomor_telepon) }}">

              @error('nomor_telepon')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  <!-- /.content -->
@endsection





   

 
