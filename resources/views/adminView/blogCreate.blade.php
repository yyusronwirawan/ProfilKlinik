@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/blog">RSGH Blog</a></li>
            <li class="breadcrumb-item active">Create Post</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/blogCreate" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title Post</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <span class="text-danger">*automatic fill</span>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug')}}">
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
                @if(old('category_id') == $category->id)
                <option value="{{$category->id}}" selected>{{ $category->kategori }}</option>
                @else
                <option value="{{$category->id}}">{{ $category->kategori }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Banner Post</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Konten Artikel</label>
            <input id="body" type="hidden" name="body" value="{{old('body')}}">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>




@endsection