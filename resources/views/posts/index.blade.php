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
            <td><a href="{{ route('posts.show', $post->id) }}"><button type="submit">Dettagli</button></a></td>
            <td><a href="{{ route('posts.edit', $post->id) }}"><button type="submit">Modifica</button></a></td>
            <td>
                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                     @CSRF
                     @method('DELETE')
                     <button type="submit">Cancella</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
