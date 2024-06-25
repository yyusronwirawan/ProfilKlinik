@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Partnership</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/partnership">partnership</a></li>
            <li class="breadcrumb-item active">Tambah Partnership</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/partnership" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_partner" class="form-label">Nama Partner</label>
            <input type="text" class="form-control @error('nama_partner') is-invalid @enderror" name="nama_partner" id="nama_partner" value="{{old('nama_partner')}}" autofocus>
            @error('nama_partner')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Logo Perusahaan</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Partner</button>
    </form>
</div>

<script>
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