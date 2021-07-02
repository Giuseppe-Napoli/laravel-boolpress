@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Post: <strong>{{$post->title}} {{$post->id}} </strong></h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)

            <ul>
                <li>{{$error}}</li>
            </ul>
                
            @endforeach
        </div>
    @endif
    <div>

        <form action="{{ route('admin.posts.update',$post) }}" method="POST">
            @csrf
            @method('PATCH'){{-- patch perche lo stiamo modificando --}}
    
           <div class="mb-3">
               <label class="label-control" for="title">Titolo</label>
               <input class="form-control" type="text" id="title" name="title" value="{{old('title',$post->title)}}">
               @error('title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
           </div>

           <div class="mb-3">
                <label class="label-control" for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" >{{ old('content',$post->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            
            <div>
                <button class="btn btn-primary" type="submit">Invio</button>
            </div>
    
        </form>
    </div>
</div>
@endsection