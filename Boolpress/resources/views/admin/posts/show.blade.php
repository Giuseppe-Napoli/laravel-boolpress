@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <h4>
        Category:
        @if ($post->category)
         <span class="badge bg-success">{{$post->category->name}}</span>
        @else
            Nessuna Categoria trovata
        @endif
    </h4>

    <h4>
        Tag:
        @forelse ( $post->tags as $tag )
         <span class="badge bg-warning">{{$tag->name}}</span>
        @empty
         <h5>Nessun Tag</h5> 
        @endforelse
    </h4>
    <p>{{ $post->content }}</p>
    <div>
        <a class="btn btn-info" href="{{ route('admin.posts.index', $post) }}">BACK</a>
    </div>

</div>
@endsection