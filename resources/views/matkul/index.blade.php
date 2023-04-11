@extends('layouts.template')

@push('custom_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="card">
  <div class="card-header">
    <a href="{{ url('matkul/create') }}" class="btn btn-outline-success">Tambah</a>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabelku" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 20px">Kode</th>
          <th>Mata kuliah</th>
          <th>Jumlah SKS</th>
          <th>Semester</th>
          <th>Dosen Pengajar</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($matkuls as $item)
        <tr>
          <td>{{ $item->kode_matkul}}</td>
          <td>{{ $item->nama}}</td>
          <td>{{ $item->sks}}</td>
          <td>{{ $item->semester}}</td>
          <td>{{ $item->dosen}}</td>
          <td>{{ $item->deskripsi}}</td>
          <td>
            <!-- Bikin tombol edit dan delete -->
            <a href="{{ url('/matkul/'. $item->kode_matkul.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
            <form method="POST" action="{{ url('/matkul/'.$item->kode_matkul) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- /.card -->

@endsection

@push('custom_js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $('#tabelku').DataTable();
  });
</script>
@endpush