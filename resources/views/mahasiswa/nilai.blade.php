<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kartu Hasil Studi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body>
  <div class="container">
    <h2 class="text-center mt-3 mb-5 text-uppercase">Prodi {{$mhs->prodi->nama}}-Politeknik Negeri Malang</h1>
    <h1 class="text-center mt-3 mb-5 text-uppercase">Kartu hasil studi (KHS)</h1>
    <h5 class=""><strong>Nim:</strong> {{$mhs->nim}}</h5>
    <h5 class=""><strong>Nama:</strong> {{$mhs->nama}}</h5>
    <h5 class=""><strong>Kelas:</strong> {{$mhs->kelas->nama}}</h5>
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Semester</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        @if($mhs->count() > 0)
        @foreach($nilai as $m)
        <tr>
          <td>{{$m->matkul->nama}}</td>
          <td>{{$m->matkul->sks}}</td>
          <td>{{$m->matkul->semester}}</td>
          <td>{{$m->nilai}}</td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="4" class="text-center">Data tidak ada</td>
        </tr>
        @endif
      </tbody>
    </table>

  </div>

  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>