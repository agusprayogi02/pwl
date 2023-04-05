@extends('layouts.template')

@section('content')
    <!-- Default box -->
    <div class="card col-md-4">
      <div class="card-body">
        <h1>Selamat Datang</h1>
      </div>
    </div>
    <!-- /.card -->
@endsection

@push('custom_js')
<script>
  alert('Selamat Datang!');
</script>
@endpush
