@extends('layouts.template')

@section('content')


<div class="card-body">

  <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Kelas</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if($mhs->count() > 0)
      @foreach($mhs as $i => $m)
      <tr>
        <td>{{$m->nim}}</td>
        <td>{{$m->nama}}</td>
        <td>{{$m->kelas->nama}}</td>
        <td>{{$m->prodi->nama}}</td>
        <td>
          <form method="POST" action="{{ url('/mahasiswa/'.$m->id) }}">
            @csrf
            @method('DELETE')
            <a href="{{ url('/mahasiswa/'. $m->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
              Show</a>
            <!-- Bikin tombol edit dan delete -->
            <a href="{{ route('mahasiswa_matakuliah.show', ['nim'=>$m->nim]) }}" class="btn btn-sm btn-success"><i
                class="fas fa-star"></i>
              Nilai</a>
            <a href="{{ url('/mahasiswa/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning"><i
                class="fas fa-edit"></i> Edit</a>
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-wind"></i> Hapus</button>
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