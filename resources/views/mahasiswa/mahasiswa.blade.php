@extends('layouts.template')

@section('content')


<div class="card-body">

  <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>JK</th>
        <th>HP</th>
        <th>Prodi</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if($mhs->count() > 0)
      @foreach($mhs as $i => $m)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$m->nim}}</td>
        <td>{{$m->nama}}</td>
        <td>{{$m->jk}}</td>
        <td>{{$m->hp}}</td>
        <td>{{$m->prodi->nama}}</td>
        <td>
          <!-- Bikin tombol edit dan delete -->
          <a href="{{ url('/mahasiswa/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

          <form method="POST" action="{{ url('/mahasiswa/'.$m->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="6" class="text-center">Data tidak ada</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
<!-- /.card-body -->

@endsection