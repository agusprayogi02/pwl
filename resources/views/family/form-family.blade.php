@extends('layouts.template')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{$url_form}}" method="post">
      @csrf
      {!! isset($family)?method_field('PUT'):''!!}

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
          value="{{(isset($family))?$family->nama:old('nama') }}" placeholder="Masukkan Nama" id="nama">
        @error('nama')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
          value="{{(isset($family))?$family->alamat:old('alamat') }}" placeholder="Masukkan Alamat" id="alamat">
        @error('alamat')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="phone">No Hp</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
          value="{{(isset($family))?$family->phone:old('phone') }}" placeholder="Masukkan phone" id="phone">
        @error('phone')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="row">
        <div class="form-group col-md">
          <label for="tempat_lahir">Tempat Lahir</label>
          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
            value="{{(isset($family))?$family->tempat_lahir:old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir"
            id="tempat_lahir">
          @error('tempat_lahir')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
            value="{{(isset($family))?$family->tanggal_lahir:old('tanggal_lahir') }}"
            placeholder="Masukkan Tanggal Lahir" id="tanggal_lahir">
          @error('tanggal_lahir')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="agama">Agama</label>
        <input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama"
          value="{{(isset($family))?$family->agama:old('agama') }}" placeholder="Masukkan Agama" id="agama">
        @error('agama')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
          value="{{(isset($family))?$family->pekerjaan:old('pekerjaan') }}" placeholder="Masukkan Pekerjaan"
          id="pekerjaan">
        @error('pekerjaan')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan"
          value="{{(isset($family))?$family->pendidikan:old('pendidikan') }}" placeholder="Masukkan Pendidikan"
          id="pendidikan">
        @error('pendidikan')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <select class="form-control @error('jk') is-invalid @enderror" name="jenis_kelamin" id="jk">
          <option value="">Pilih Jenis Kelamin</option>
          <option value="L" {{(isset($family) && $family->jenis_kelamin == 'L')?'selected':''}}>Laki-laki</option>
          <option value="P" {{(isset($family) && $family->jenis_kelamin == 'P')?'selected':''}}>Perempuan</option>
        </select>
        @error('jk')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection