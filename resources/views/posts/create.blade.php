@extends('layouts.layout')

@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    @CSRF
    @method('POST')
  <div class="form-group">
    <label for="titolo">Titolo post</label>
    <input type="text" class="form-control" id="titolo" name="title" placeholder="Inserisci titolo del post">

  </div>
  <div class="form-group">
    <label for="autore">Autore</label>
    <input type="text" class="form-control" id="autore" name="author" placeholder="Inserisci autore">

  </div>
  <div class="form-group">
    <label for="categoria">Categoria: </label>
    <select class="" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->title }}
        </option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="testo">Testo del post</label>
    <input type="text" class="form-control" id="testo" name="description" placeholder="Inserisci testo del post">
  </div>
  <div class="form-group">
      <label for="tag">Tags: </label>
      @foreach ($tags as $tag)
      <label for="tags">{{$tag->name}}</label>
      <input type="checkbox" value="{{ $tag->id }}" name="tags[]">
      @endforeach
  </div>
  <button type="submit" class="btn btn-primary">Crea post</button>
</form>

@endsection
