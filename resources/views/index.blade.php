@extends('layout')

@section('content')

    @foreach($posts as $post)
        <h4>Post n. {{ $post->id }}</h4>
        <h4>{{ $post->title }}</h4>
        <h5>Categoria: {{ $post->category->title }}</h5>
        <h5>Tags:
        @foreach($post->tag as $tag)
            {{ $tag->name }}
        @endforeach
        </h5>
        <p><strong>Descrizione: </strong>{{ $post->postInformation->description }}</p><br>
    @endforeach

@endsection
