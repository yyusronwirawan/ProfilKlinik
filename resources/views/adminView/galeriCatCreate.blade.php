@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Foto</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/dashboard/galeri">Galeri</a></li>
            <li class="breadcrumb-item active">Tambah Kategori Foto</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/galeri-kategori">
        @csrf
        <div class="mb-3 col-md-6">
            <label for="galeri_kategori" class="form-label">Kategori Foto</label>
            <input type="text" class="form-control @error('galeri_kategori') is-invalid @enderror" name="galeri_kategori" id="galeri_kategori" value="{{old('galeri_kategori')}}" autofocus>
            @error('galeri_kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah kategori</button>
    </form>
</div>




@endsection