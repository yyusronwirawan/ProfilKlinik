@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Gambar Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/layanan-poliklinik">Layanan Poliklinik</a></li>
            <li class="breadcrumb-item active">Tambah gambar</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <h4>{{ $layanan->nama_layanan }}</h4>
    <form method="POST" action="/dashboard/layananImage" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 mb-3">
            <input type="hidden" class="form-control" name="layanan_id" id="layanan_id" placeholder="layanan_id" value="{{$layanan->id}}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Images</button>
    </form>
</div>




@endsection