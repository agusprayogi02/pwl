@extends('layouts.template')

@section('content')
<div class="card">
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
</div>
@endsection