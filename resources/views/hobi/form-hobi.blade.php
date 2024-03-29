@extends('layouts.template')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{$url_form}}" method="post">
      @csrf
      {!! isset($hobs)?method_field('PUT'):''!!}

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
          value="{{(isset($hobs))?$hobs->nama:old('nama') }}" placeholder="Masukkan Nama" id="nama">
        @error('nama')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
          value="{{(isset($hobs))?$hobs->deskripsi:old('deskripsi') }}" placeholder="Masukkan Deskripsi" id="deskripsi">
        @error('deskripsi')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection