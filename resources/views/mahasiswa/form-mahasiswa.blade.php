@extends('layouts.template')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{$url_form}}" method="post" enctype="multipart/form-data">
      @csrf
      {!! isset($mhs)?method_field('PUT'):''!!}
      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
          value="{{(isset($mhs))?$mhs->nim:old('nim') }}" placeholder="Masukkan NIM" id="nim">
        @error('nim')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
          value="{{(isset($mhs))?$mhs->nama:old('nama') }}" placeholder="Masukkan Nama" id="nama">
        @error('nama')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <label for="file-image">Foto</label>
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
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
          value="{{(isset($mhs))?$mhs->alamat:old('alamat') }}" placeholder="Masukkan Alamat" id="alamat">
        @error('alamat')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <div class="row">

        <div class="form-group col-md">
          <label for="tempat_lahir">Tempat Lahir</label>
          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
            value="{{(isset($mhs))?$mhs->tempat_lahir:old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir"
            id="tempat_lahir">
          @error('tempat_lahir')
          <span class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
            value="{{(isset($mhs))?$mhs->tanggal_lahir:old('tanggal_lahir') }}" placeholder="Masukkan Tanggal Lahir"
            id="tanggal_lahir">
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
        <label for="kelas_id">Kelas</label>
        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="kelas_id">
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
        <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp"
          value="{{(isset($mhs))?$mhs->hp:old('hp') }}" placeholder="Masukkan No. HP" id="hp">
        @error('hp')
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection

@push('custom_js')
<script src="{{ asset('assets\plugins\bs-custom-file-input\bs-custom-file-input.min.js') }}"></script>
<script>
  $(function () {
  bsCustomFileInput.init();
  });
</script>
@endpush