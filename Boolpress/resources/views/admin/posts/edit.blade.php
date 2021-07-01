@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Post: <strong>{{$post->title}} {{$post->id}} </strong></h1>
    <div>
        <form action="{{ route('admin.posts.update',$post) }}" method="POST">
            @csrf
            @method('PATCH'){{-- patch perche lo stiamo modificando --}}
    
           <div class="mb-3">
               <label class="label-control" for="title">Titolo</label>
               <input class="form-control" type="text" id="title" name="title" value="{{$post->title}}">
           </div>

           <div class="mb-3">
                <label class="label-control" for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control" rows="5" >{{ $post->content }}</textarea>
            </div>
            
            <div>
                <button class="btn btn-primary" type="submit">Invio</button>
            </div>
    
        </form>
    </div>
</div>
@endsection