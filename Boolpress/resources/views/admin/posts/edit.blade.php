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
            
            <div class="mb-3">
                <label class="label-control" for="category_id">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror"
                name="category_id" id="category_id">
                    <option value=""> - selezionare una categoria - </option>
                    @foreach ($categories as $category)
                    <option 
                    @if(old('category_id',$post->category_id) == $category->id)  selected @endif
                    value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    @endforeach
                    
                </select>

            </div>

            <div class="mb-3">
                <h4>Tag</h4>
                @foreach ($tags as $tag)

                    <span class="d-inline-block mr-3">
                        <input type="checkbox" id="tag{{$loop->iteration}}"
                            name="tags[]" 
                            value="{{$tag->id}}"
                        @if(in_array($tag->id,old('tags',[])) && $errors->any())
                            checked
                        @elseif (!$errors->any() && $post->tags->contains($tag->id))
                            checked
                        @endif>

                        <label for="tag{{$loop->iteration}}">
                            {{$tag->name}}
                        </label>

                    </span>

                @endforeach
                @error('tags')
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