@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Edit Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/blog">RSGH Blog</a></li>
            <li class="breadcrumb-item active">Edit Post</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/blog/{{$post->slug}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title Post</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title', $post->title)}}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug', $post->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                @if(old('category_id', $post->category_id) == $category->id)
                <option value="{{$category->id}}" selected>{{ $category->kategori }}</option>
                @else
                <option value="{{$category->id}}">{{ $category->kategori }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Banner Post</label>
            <input type="hidden" name="oldImage" value="{{$post->image}}">

            @if($post->image)
            <img src="{{asset('images/blog-image/'.$post->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">body</label>
            <input id="body" type="hidden" name="body" value="{{old('body', $post->body)}}">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>




@endsection