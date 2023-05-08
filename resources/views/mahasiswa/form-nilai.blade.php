@extends('layouts.template')

@section('content')
<div class="card col-md-6">
  <div class="card-header">
    <h3 class="card-title">Form Nilai: {{$mhs->nama}}</h3>
  </div>
  <div class="card-body">
    <form action="{{route('mahasiswa_matakuliah.create', ['nim' => $mhs->nim])}}" method="post">
      @csrf
      <div class="form-group">
        <label for="kode_matkul">Mata Kuliah</label>
        <select class="form-control @error('kode_matkul') is-invalid @enderror" name="kode_matkul" id="kode_matkul">
          <option value="">Pilih Mata Kuliah</option>
          @foreach ($matkul as $k)
          <option value="{{$k->kode_matkul}}" {{ old('kode_matkul')==$k->kode_matkul? 'selected': ''}}>{{$k->nama}}
          </option>
          @endforeach
        </select>
        @error('kode_matkul')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="nilai">Nilai</label>
        <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai"
          placeholder="Masukkan Nilai" value="{{old('nilai')}}" id="nilai">
        @error('nilai')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection