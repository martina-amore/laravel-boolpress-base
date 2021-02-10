@extends('layouts.layout')

@section('content')

<form method="POST" action="{{ route('posts.update', $post['id']) }}">
    @CSRF
    @method('PUT')
  <div class="form-group">
    <label for="titolo">Titolo post</label>
    <input type="text" class="form-control" id="titolo" name="title" value="{{$post->title}}" placeholder="Inserisci titolo del post">
    @error('title')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="autore">Autore</label>
    <input type="text" class="form-control" id="autore" name="author" value="{{$post->author}}" placeholder="Inserisci autore">
    @error('author')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="categoria">Categoria: </label>
    <select class="" name="category_id">
        @foreach ($categories as $category)
        <option {{$post->category->id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
            {{ $category->title }}
        </option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="testo">Testo del post</label>
    <input type="text" class="form-control" id="testo" name="description" value="{{$post->postInformation->description}}" placeholder="Inserisci testo del post">
  </div>
  <div class="form-group">
      <label for="tag">Tags: </label>
      @foreach ($tags as $tag)
      <label for="tags">{{$tag->name}}</label>
      <input {{$post->tag->contains($tag) ? 'checked' : '' }} type="checkbox" value="{{ $tag->id }}" name="tags[]">
      @endforeach
  </div>
  <button type="submit" class="btn btn-primary">Modifica post</button>
</form>

@endsection
