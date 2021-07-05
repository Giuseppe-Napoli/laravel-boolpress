@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuovo post</h1>
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
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            
            <div class="mb-3">
                <label class="label-control" for="title">Titolo</label>
                <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control {{-- se il title va in errore allora aggiungi la classe is-invalid --}} @error('title') is-invalid @enderror">
                @error('title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="label-control" for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control {{-- se il content va in errore allora aggiungi la classe is-invalid --}} @error('content') is-invalid @enderror" rows="5" >{{old('content')}}</textarea>
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
                    @if(old('category_id') == $category->id)  selected @endif
                    value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    @endforeach
                    
                </select>

            </div>
            <div>
                <button class="btn btn-primary" type="submit">Invio</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>

        </form>
    </div>


</div>
@endsection