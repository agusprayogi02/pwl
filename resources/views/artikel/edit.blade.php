@extends('layouts.template')

@section('content')

<div class="card col-md-8 m-auto">
  <div class="card-body">
    <div class="container">
      <form action="{{ route('articles.update', $article->id_artikel) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="title">Judul: </label>
        <input type="text" id="title" class="form-control" required="required" name="judul"
          value="{{ $article->judul }}" /></br>
        <label for="penulis">Penulis: </label>
        <input type="text" id="penulis" class="form-control" required="required" name="penulis"
          value="{{ $article->penulis }}" /><br>
        <label for="slug">Slug: </label>
        <input type="text" id="slug" class="form-control" required="required" name="slug"
          value="{{ $article->slug }}" /></br>
        <label for="content">Content: </label>
        <textarea type="text" class="form-control" required="required" name="isi">{{ $article->isi }}</textarea></br>
        <div class="row">
          <img class="col-md-3" src="{{asset('storage/'.$article->gambar)}}" />
          <div class="col-md">
            <label for="gambar">Feature Image: </label>
            <input type="file" id="gambar" class="form-control" required="required" name="gambar" />
          </div>
        </div>
    </div>
  </div>
  <div class="card-footer">
    <a href="{{ route('articles.index') }}" class="btn btn-danger">Cancel</a>
    <button type="submit" name="submit" class="btn btn-primary 
    float-right">Simpan</button>
  </div>
</div>

@endsection