@extends('layouts.layout')

@section('content')
<table class="table">
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
        </tr>
</table>

@endsection
