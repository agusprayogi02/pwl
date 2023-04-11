@extends('layouts.template')

@push('custom_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="card">
  <!-- /.card-header -->
  <div class="card-header">
    <a href="{{ url('hobi/create') }}" class="btn btn-outline-success">Tambah</a>
  </div>
  <div class="card-body">
    <table id="tabelku" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Hobi</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $i = 1;
        @endphp
        @foreach ($hobbies as $item)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $item->nama}}</td>
          <td>{{ $item->deskripsi}}</td>
          <td>
            <!-- Bikin tombol edit dan delete -->
            <a href="{{ url('/hobi/'. $item->id_hobi.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

            <form method="POST" action="{{ url('/hobi/'.$item->id_hobi) }}">
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
@endpush