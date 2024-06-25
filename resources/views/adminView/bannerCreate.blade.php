@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Banner</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/dashboard/banner">Kelola Banner</a></li>
            <li class="breadcrumb-item active">Create Banner</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/banner" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="banner_title" class="form-label">Title Banner</label>
            <input type="text" class="form-control @error('banner_title') is-invalid @enderror" name="banner_title" id="banner_title" value="{{old('banner_title')}}" autofocus>
            @error('banner_title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
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

        <button type="submit" class="btn btn-primary">Buat Banner</button>
    </form>
</div>




@endsection