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
    <h3 class="card-title">List Articles</h3>
    <a href="{{ route('articles.create') }}" class="btn btn-success float-right">Add New Article</a>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabelku" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Judul</th>
          <th>Gambar</th>
          <th>Slug</th>
          <th>Isi</th>
          <th>Penulis</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{ $item->id_artikel}}</td>
          <td>{{ $item->judul}}</td>
          <td><img width="150px" src="{{ asset('storage/'. $item->gambar)}}" class="img-thumb" /></td>
          <td>{{ $item->slug}}</td>
          <td>{{ $item->isi}}</td>
          <td>{{ $item->penulis}}</td>
          <td>
            <form action="{{ route('articles.destroy', $item->id_artikel) }}" method="post">
              <a href="{{ route('articles.edit', $item->id_artikel) }}" class="btn btn-warning">Edit</a>
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure to delete this data?')">Delete</button>
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