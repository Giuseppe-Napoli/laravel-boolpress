@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <div>
        <a class="btn btn-info" href="{{ route('admin.posts.index', $post) }}">BACK</a>
    </div>

</div>
@endsection