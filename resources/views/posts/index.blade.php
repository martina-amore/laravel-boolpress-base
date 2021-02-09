@extends('layouts.layout')

@section('content')
<table class="table">
    @foreach($posts as $post)
        <tr>
            <td><h4>Post n. {{ $post->id }}</h4></td>
            <td><h4>{{ $post->title }}</h4></td>
            <td><h5>Categoria: {{ $post->category->title }}</h5></td>
            <td><h5>Tags:
                @foreach($post->tag as $tag)
                {{ $tag->name }}
                @endforeach
            </h5></td>
            <td><p><strong>Descrizione: </strong>{{ $post->postInformation->description }}</p><br></td>
            <td><a href="{{ route('posts.show', $post->id) }}">Dettagli</a></td>
            <td><a href="{{ route('posts.edit', $post->id) }}">Modifica</a></td>
            <td><a href="">Cancella</a></td>
        </tr>
    @endforeach
</table>

@endsection
