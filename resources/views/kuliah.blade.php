@extends('layouts.template')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengalaman Kuliah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kuliah</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pengalaman Kuliah diPolinema</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        kuliah di polinema cukup mengasikkan, jamnya juga tidak terlalu padat dan teman-teman yang ada juga sangat ramah
        dan membantu, hanya saja menurut saya untuk masalah fasilitas masih kurang diperhatikan, ada beberapa yang sudah
        mulai rusak dan sampai sekarang belom diperhatikan.
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Salam Hangat
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection