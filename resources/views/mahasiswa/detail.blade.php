@extends('layouts.template')

@section('content')
<div class="col-md-6">
  <div class="card ">
    <div class="card-header">
      Detail Mahasiswa
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Nim: </b>{{$mhs->nim}}</li>
        <li class="list-group-item"><b>Nama: </b>{{$mhs->nama}}</li>
        <li class="list-group-item"><b>Prodi: </b>{{$mhs->prodi->nama}}</li>
        <li class="list-group-item"><b>Kelas: </b>{{$mhs->kelas->nama}}</li>
        <li class="list-group-item"><b>Jenis Kelamin: </b>{{$mhs->jk == 'L'?'Laki-Laki':'Perempuan'}}</li>
        <li class="list-group-item"><b>Hp: </b>{{$mhs->hp}}</li>
      </ul>
    </div>
    <div class="card-footer">
      <a href="{{ route('mahasiswa_matakuliah.nilai', ['nim' => $mhs->nim]) }}" class="btn btn-success">Print KHS</a>
      <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger float-right">Back</a>
    </div>
  </div>
</div>
@endsection