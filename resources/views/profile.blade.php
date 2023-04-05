@extends('layouts.template')

@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Profile Saya</h3>

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
    <table class="table col-4">
      <tr>
        <td>NIM</td>
        <td>:</td>
        <td>2141720025</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$nama}}</td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>2A</td>
      </tr>
      <tr>
        <td>Domisili</td>
        <td>:</td>
        <td>Malang</td>
      </tr>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Terimakasih
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection