@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Fasilitas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/fasilitas-layanan">Fasilitas layanan</a></li>
            <li class="breadcrumb-item active">Tambah Fasilitas Layanan</li>
        </ol>
    </nav>
</div>
<form method="POST" action="/dashboard/fasilitas-layanan" enctype="multipart/form-data">
    @csrf
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" name="nama_fasilitas" id="nama_fasilitas" value="{{old('nama_fasilitas')}}" autofocus>
                @error('nama_fasilitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <span class="text-danger">*automatic fill</span>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug')}}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="kategori" class="form-label">kategori</label>
                <select name="kategori" class="form-select">
                    <option value="Fasilitas Layanan Kesehatan" @if (old('kategori')=='Fasilitas Layanan Kesehatan' ) selected="selected" @endif>Fasilitas Layanan Kesehatan</option>
                    <option value="Fasilitas Penunjang Medis" @if (old('kategori')=='Fasilitas Penunjang Medis' ) selected="selected" @endif>Fasilitas Penunjang Medis</option>
                    <option value="Fasilitas Layanan Unggulan" @if (old('kategori')=='Fasilitas Layanan Unggulan' ) selected="selected" @endif>Fasilitas Layanan Unggulan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Fasilitas</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col mb-3 mt-3">
                <label for="ket" class="form-label">Keterangan</label>
                <input id="ket" type="hidden" name="ket" value="{{old('ket')}}">
                <trix-editor input="ket"></trix-editor>
                @error('ket')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Fasilitas</button>
        </div>
    </div>

</form>

<script>
    const nama_fasilitas = document.querySelector("#nama_fasilitas");
    const slug = document.querySelector("#slug");

    nama_fasilitas.addEventListener("keyup", function() {
        let preslug = nama_fasilitas.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>


@endsection