<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kartu Hasil Studi</title>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body>
  <div class="container">
    <h6 class="text-center mt-3 mb-5 text-uppercase">Prodi {{$mhs->prodi->nama}}-Politeknik Negeri Malang</h1>
      <h3 class="text-center mt-3 mb-5 text-uppercase">Kartu hasil studi (KHS)</h3>
      <table>
        <tr>
          <td><strong>Nim</strong></td>
          <td><strong> : </strong></td>
          <td>{{$mhs->nim}}</td>
        </tr>
        <tr>
          <td><strong>Nama</strong></td>
          <td><strong> : </strong></td>
          <td class="text-capitalize">{{$mhs->nama}}</td>
        </tr>
        <tr>
          <td><strong>Kelas</strong></td>
          <td><strong> : </strong></td>
          <td>{{$mhs->kelas->nama}}</td>
        </tr>
      </table>
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

      @if (!$cetak)
      <div class="d-flex justify-content-center">
        <a href="{{ route('mahasiswa_matakuliah.cetak_pdf', ['nim' => $mhs->nim]) }}" class="btn btn-danger">Cetak ke
          PDF</a>
      </div>
      @endif
  </div>

  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>