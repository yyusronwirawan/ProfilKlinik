@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Foto</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/dashboard/galeri">Galeri</a></li>
            <li class="breadcrumb-item active">Tambah Foto</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/galeri" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title_galeri" class="form-label">Title Foto</label>
            <input type="text" class="form-control @error('title_galeri') is-invalid @enderror" name="title_galeri" id="title_galeri" value="{{old('title_galeri')}}" autofocus>
            @error('title_galeri')
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

        <div class="mb-3 col-md-6">
            <label for="kategori" class="form-label">kategori</label>
            <select name="kategori_id" class="form-select">
                @foreach ($kategories as $kategori)
                @if(old('kategori_id') == $kategori->id)
                <option value="{{$kategori->id}}" selected>{{ $kategori->galeri_kategori }}</option>
                @else
                <option value="{{$kategori->id}}">{{ $kategori->galeri_kategori }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Pilih Foto</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan Singkat</label>
            <input id="keterangan" type="hidden" name="keterangan" value="{{old('keterangan')}}">
            <trix-editor input="keterangan" id="isi"></trix-editor>
            @error('keterangan')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Foto</button>
    </form>
</div>

<script>
    const title_galeri = document.querySelector("#title_galeri");
    const slug = document.querySelector("#slug");

    title_galeri.addEventListener("keyup", function() {
        let preslug = title_galeri.value;
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