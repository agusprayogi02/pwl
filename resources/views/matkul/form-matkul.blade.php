@extends('layouts.template')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{$url_form}}" method="post">
      @csrf
      {!! isset($matkul)?method_field('PUT'):''!!}

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
          value="{{(isset($matkul))?$matkul->nama:old('nama') }}" placeholder="Masukkan Nama" id="nama">
        @error('nama')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
          value="{{(isset($matkul))?$matkul->deskripsi:old('deskripsi') }}" placeholder="Masukkan Deskripsi"
          id="deskripsi">
        @error('deskripsi')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="sks">Jumlah SKS</label>
        <input type="number" class="form-control @error('sks') is-invalid @enderror" name="sks"
          value="{{(isset($matkul))?$matkul->sks:old('sks') }}" placeholder="Masukkan Jumlah SKS" id="sks">
        @error('sks')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="semester">Semester</label>
        <input type="number" class="form-control @error('semester') is-invalid @enderror" name="semester"
          value="{{(isset($matkul))?$matkul->semester:old('semester') }}" placeholder="Masukkan Semester" id="semester">
        @error('semester')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="dosen">Dosen</label>
        <input type="text" class="form-control @error('dosen') is-invalid @enderror" name="dosen"
          value="{{(isset($matkul))?$matkul->dosen:old('dosen') }}" placeholder="Masukkan Dosen" id="dosen">
        @error('dosen')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection