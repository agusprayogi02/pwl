@extends('layouts.template')

@section('content')

<div class="card">
  <div class="card-header">
    <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Foto</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if($mhs->count() > 0)
        @foreach($mhs as $i => $m)
        <tr>
          <td>{{$i + $mhs->firstItem()}}</td>
          <td>{{$m->nim}}</td>
          <td>{{ Str::title($m->nama)}}</td>
          <td>
            @if ($m->photo)
            <img src="{{ asset('storage/'.$m->photo) }}" height="100px" class="img-thumbnail" alt="">
            @else
            <p class="text-danger">No Foto</p>
            @endif
          </td>
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
  <div class="card-footer">
    {!! $mhs->links() !!}
  </div>
</div>
<!-- /.card-body -->

@endsection