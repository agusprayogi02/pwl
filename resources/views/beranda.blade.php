@extends('layouts.template')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card col-md-4">
      <div class="card-body">
        <h1>Selamat Datang</h1>
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection

@push('custom_js')
<script>
  alert('Selamat Datang!');
</script>
@endpush