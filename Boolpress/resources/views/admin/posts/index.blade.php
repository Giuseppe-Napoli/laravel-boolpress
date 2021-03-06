@extends('layouts.app')

@section('content')
<div class="container">
    <h1>I miei Post</h1>
    @if (session('deleted'))
        <span class="alert alert-success">
            <strong>{{ session('deleted') }}</strong>
            Post eliminato con successo!
        </span>
    @endif
    <table class="table table-success table-striped mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tag</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        @if ($post->category)
                            {{ $post->category->name }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @forelse ( $post->tags as $tag )
                          <span class="badge bg-warning">{{$tag->name}}</span>
                        @empty
                            - 
                        @endforelse
                    </td>
                    
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">SHOW</a>
                    </td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy',$post) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        @foreach ($categories as $category)
            <h3>{{$category->name}}</h3>
            <ul>
                @forelse ($category->posts as $post_category)
                    <li>
                        <a href="{{route('admin.posts.show', $post_category)}}">{{$post_category->title}}</a>
                    </li>
                @empty
                    <li>Nessun Post</li>
                @endforelse
            </ul>
        @endforeach
</div>
@endsection