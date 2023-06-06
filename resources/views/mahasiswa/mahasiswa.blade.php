@extends('layouts.template')

@section('content')

<div class="card">
  <div class="card-header">
    <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" id="data_mahasiswa">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Prodi</th>
          <th>Foto</th>
          <th>No Hp</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
<!-- /.card-body -->
<div class="modal fade" id="modal_detail" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group list-group-flush col-md">
          <li class="list-group-item" id="nim"></li>
          <li class="list-group-item" id='nama'></li>
          <li class="list-group-item" id="tmp"></li>
          <li class="list-group-item" id="tgl"></li>
          <li class="list-group-item" id="alamat"></li>
          <li class="list-group-item" id="kelas"></li>
          <li class="list-group-item" id="jk"></li>
          <li class="list-group-item" id="hp"></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
  <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog modal-">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row form-message"></div>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{(isset($mhs))?$mhs->nim:old('nim') }}" placeholder="Masukkan NIM" id="nim">
            @error('nim')
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{(isset($mhs))?$mhs->nama:old('nama') }}" placeholder="Masukkan Nama" id="nama">
            @error('nama')
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          {{-- <label for="file-image">Foto</label>
          <div class="@isset($mhs->photo) row @endisset">
            @isset($mhs->photo)
            <img src="{{ asset('storage/'.$mhs->photo) }}" class="col-md-2 mb-2" alt="">
          @endisset
          <div class="custom-file mb-3 col-md">
            <input type="file" name="image" class="custom-file-input @error('image')
                      is-invalid
                    @enderror" id="file-image" required>
            <label class="custom-file-label" for="file-image">Choose image photo</label>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div> --}}
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{(isset($mhs))?$mhs->alamat:old('alamat') }}" placeholder="Masukkan Alamat" id="alamat">
          @error('alamat')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="row">

          <div class="form-group col-md">
            <label for="tmp">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{(isset($mhs))?$mhs->tempat_lahir:old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir" id="tmp">
            @error('tempat_lahir')
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group col-md">
            <label for="tgl">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{(isset($mhs))?$mhs->tanggal_lahir:old('tanggal_lahir') }}" placeholder="Masukkan Tanggal Lahir" id="tgl">
            @error('tanggal_lahir')
            <span class="error invalid-feedback">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="jk">Jenis Kelamin</label>
          <select class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L" {{(isset($mhs) && $mhs->jk == 'L')?'selected':''}}>Laki-laki</option>
            <option value="P" {{(isset($mhs) && $mhs->jk == 'P')?'selected':''}}>Perempuan</option>
          </select>
          @error('jk')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="id_prodi">Prodi</label>
          <select class="form-control @error('id_prodi') is-invalid @enderror" name="id_prodi" id="id_prodi">
            <option value="">Pilih Prodi</option>
            @foreach ($prodis as $prodi)
            <option value="{{$prodi->prodi_id}}" {{(isset($mhs) && $mhs->id_prodi ==
                $prodi->prodi_id)?'selected':''}}>{{$prodi->nama}}
            </option>
            @endforeach
          </select>
          @error('id_prodi')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="kelas">Kelas</label>
          <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="kelas">
            <option value="">Pilih Kelas</option>
            @foreach ($kelas as $k)
            <option value="{{$k->id}}" {{(isset($mhs) && $mhs->kelas_id ==
                $k->id)?'selected':''}}>{{$k->nama}}
            </option>
            @endforeach
          </select>
          @error('kelas_id')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="hp">No. HP</label>
          <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{(isset($mhs))?$mhs->hp:old('hp') }}" placeholder="Masukkan No. HP" id="hp">
          @error('hp')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

  </form>
</div>

@endsection

@push('custom_js')
<script src="{{ asset('assets\plugins\bs-custom-file-input\bs-custom-file-input.min.js') }}"></script>
<script>
  var dataMahasiswa = $('#data_mahasiswa').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      'url': `{{ url('mahasiswa/data') }}`,
      'dataType': 'json',
      'type': 'POST',
    },
    columns: [{
        data: 'nomor',
        name: 'nomor',
        searchable: false,
        sortable: false
      },
      {
        data: 'nim',
        name: 'nim',
        sortable: false,
        searchable: true
      },
      {
        data: 'nama',
        name: 'nama',
        sortable: false,
        searchable: true
      },
      {
        data: 'kelas.nama',
        name: 'kelas',
        sortable: false,
        searchable: true
      },
      {
        data: 'prodi.nama',
        name: 'prodi',
        sortable: false,
        searchable: true
      },
      {
        data: 'photo',
        name: 'photo',
        sortable: false,
        searchable: false,
        render: function(data, type, row, meta) {
          return data != null ? "<img src='{{ asset('storage') }}/" + data + "' width='100px' height='100px' />" : "No Photo";
        }
      },
      {
        data: 'hp',
        name: 'hp',
        sortable: false,
        searchable: true
      },
      {
        data: 'id',
        name: 'id',
        sortable: false,
        searchable: false,
        render: function(data, type, row, meta) {
          var btn = `<button data-url="{{ url('/mahasiswa')}}/` + data + `" class="btn btn-xs btn-warning" onclick="updateData(this)"
        data-id="` + row.id + `" data-nim="` + row.nim + `" data-nama="` + row.nama + `" data-alamat="` + row.alamat + `" data-tmp="` + row.tempat_lahir + `" data-tgl="` + row.tanggal_lahir + `" data-jk="` + row.jk + `" data-hp="` + row.hp + `"><i class="fa fa-edit"></i>
        Edit</button> 
      <button class="btn btn-xs btn-success" onclick="return detailData(this)"
        data-id="` + row.id + `" data-nim="` + row.nim + `" data-nama="` + row.nama + `" data-alamat="` + row.alamat + `" data-tmp="` + row.tempat_lahir + `" data-tgl="` + row.tanggal_lahir + `" data-jk="` + row.jk + `" data-hp="` + row.hp + `" data-kelas="` + row.kelas.nama + `"><i class="fa fa-list"> </i>
        Detail</button>
        <button class="btn btn-xs btn-danger"
          onclick="return deleteData(` + data + `)"><i class="fa fa-trash"></i> Hapus</button>`;
          return btn;
        }
      },
    ]
  });

  function deleteData(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
      $.ajax({
        url: 'mahasiswa/' + id,
        type: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          alert(response.message);
          dataMahasiswa.draw();
        },
        error: function(xhr) {
          alert('Terjadi kesalahan. Silakan coba lagi.');
        }
      });
    }
  }

  function updateData(th) {
    $('#modal_mahasiswa').modal('show');
    $('#modal_mahasiswa .modal-title').html('Edit Data Mahasiswa');
    $('#modal_mahasiswa #nim').val($(th).data('nim'));
    $('#modal_mahasiswa #nama').val($(th).data('nama'));
    $('#modal_mahasiswa #alamat').val($(th).data('alamat'));
    $('#modal_mahasiswa #tmp').val($(th).data('tmp'));
    $('#modal_mahasiswa #tgl').val($(th).data('tgl'));
    $('#modal_mahasiswa #jk').val($(th).data('jk'));
    $('#modal_mahasiswa #hp').val($(th).data('hp'));
    $('#modal_mahasiswa #form_mahasiswa').attr('action', $(th).data('url'));
    $('#modal_mahasiswa #form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
  }

  function detailData(th) {
    $('#modal_detail').modal('show');
    $('#modal_detail #nim').html('<b>Nim: </b>' +
      $(th).data('nim'));
    $('#modal_detail #nama').html('<b>Nama: </b>' + $(th).data('nama'));
    $('#modal_detail #alamat').html('<b>Alamat: </b>' + $(th).data('alamat'));
    $('#modal_detail #tmp').html('<b>Tempat: </b>' + $(th).data('tmp'));
    $('#modal_detail #tgl').html('<b>Tanggal Lahir: </b> ' + $(th).data('tgl'));
    $('#modal_detail #jk').html('<b>Jenis Kelamin: </b>' + ($(th).data('jk') == 'L' ? 'Laki-laki' : 'Perempuan'));
    $('#modal_detail #hp').html('<b>No HP: </b>' + $(th).data('hp'));
    $('#modal_detail #kelas').html('<b>Kelas: </b>' + $(th).data('kelas'));
  }

  $(document).ready(function() {
    bsCustomFileInput.init();

    $('#form_mahasiswa').submit(function(e) {

      var data = $(this).serialize();
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        method: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data) {
          $('.form-message').html('');
          if (data.status) {
            $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
            $('#form_mahasiswa')[0].reset();
            dataMahasiswa.ajax.reload();
            $('#form_mahasiswa').attr('action', `{{ url('mahasiswa') }}`);
            $('#form_mahasiswa').find('input[name="_method"]').remove();
          } else {
            $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
            alert('error');
          }

          if (data.modal_close) {
            $('.form-message').html('');
            $('#modal_mahasiswa').modal('hide');
          }

        }
      });
    });
  });
</script>
@endpush