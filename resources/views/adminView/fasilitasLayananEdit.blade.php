@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Edit Fasilitas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/fasilitas-layanan">Fasilitas layanan</a></li>
            <li class="breadcrumb-item active">Edit Fasilitas Layanan</li>
        </ol>
    </nav>
</div>
<form method="POST" action="/dashboard/fasilitas-layanan/{{$fasilitas->id}}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" name="nama_fasilitas" id="nama_fasilitas" value="{{old('nama_fasilitas', $fasilitas->nama_fasilitas)}}" autofocus>
                @error('nama_fasilitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <span class="text-danger">*automatic fill</span>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug', $fasilitas->slug)}}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="kategori" class="form-label">kategori</label>
                <select name="kategori" class="form-select">
                    @if(old('kategori', $fasilitas->kategori) == 'Fasilitas Layanan Kesehatan')
                    <option value="Fasilitas Layanan Kesehatan" selected>Fasilitas Layanan Kesehatan</option>
                    <option value="Fasilitas Penunjang Medis">Fasilitas Penunjang Medis</option>
                    <option value="Fasilitas Layanan Unggulan">Fasilitas Layanan Unggulan</option>

                    @elseif(old('kategori', $fasilitas->kategori) == 'Fasilitas Penunjang Medis')
                    <option value="Fasilitas Penunjang Medis" selected>Fasilitas Penunjang Medis</option>
                    <option value="Fasilitas Layanan Kesehatan">Fasilitas Layanan Kesehatan</option>
                    <option value="Fasilitas Layanan Unggulan">Fasilitas Layanan Unggulan</option>

                    @else
                    <option value="Fasilitas Layanan Unggulan" selected>Fasilitas Layanan Unggulan</option>
                    <option value="Fasilitas Penunjang Medis">Fasilitas Penunjang Medis</option>
                    <option value="Fasilitas Layanan Kesehatan">Fasilitas Layanan Kesehatan</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image Fasilitas</label>
                <input type="hidden" name="oldImage" value="{{$fasilitas->image}}">

                @if($fasilitas->image)
                <img src="{{asset('images/fasilitas-layanan-image/'.$fasilitas->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif

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
                <input id="ket" type="hidden" name="ket" value="{{old('ket', $fasilitas->ket)}}">
                <trix-editor input="ket"></trix-editor>
                @error('ket')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Fasilitas</button>
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