@extends('layouts.template')

@section('content')

<div class="card col-md-8 m-auto">
  <div class="card-body">
    <div class="container">
      <form action="/articles" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Judul: </label>
          <input type="text" id="title" class="form-control" required="required" name="judul" /></br>
          <label for="penulis">Penulis: </label>
          <input type="text" id="penulis" class="form-control" required="required" name="penulis" /><br>
          <label for="slug">Slug: </label>
          <input type="text" id="slug" class="form-control" required="required" name="slug" /></br>
          <label for="content">Content: </label>
          <textarea type="text" class="form-control" required="required" name="isi"></textarea></br>
          <label for="image">Feature Image: </label>
          <input type="file" class="form-control" required="required" name="image" /></br>
          <a href="{{ route('articles.index') }}" class="btn btn-danger">Cancel</a>
          <button type="submit" name="submit" class="btn btn-primary 
float-right">Simpan</button>
        </div>
    </div>
  </div>
</div>

@endsection