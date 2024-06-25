@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Edit Lowongan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/lowongan">Data Lowongan</a></li>
            <li class="breadcrumb-item active">Edit Lowongan</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/lowongan/{{$data->slug}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi Lowongan</label>
            <input type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" id="posisi" value="{{old('posisi',$data->posisi)}}" autofocus>
            @error('posisi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <span class="text-danger">*automatic fill</span>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug',$data->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- <div class="mb-3">
            <label for="periode_akhir" class="form-label">Periode Akhir</label>
            <input type="Date" class="form-control @error('periode_akhir') is-invalid @enderror" name="periode_akhir" id="periode_akhir" value="{{old('periode_akhir',$data->periode_akhir)}}" autofocus>
            @error('periode_akhir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> -->

        <div class="mb-3">
            <label for="excerpt" class="form-label">Tentang Lowongan</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="excerpt" value="{{old('excerpt')}}"></textarea>
            @error('excerpt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="persyaratan" class="form-label">Persyaratan</label>
            <input id="persyaratan" type="hidden" name="persyaratan" value="{{old('persyaratan',$data->persyaratan)}}">
            <trix-editor input="persyaratan"></trix-editor>
            @error('persyaratan')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Lowongan</button>
    </form>
</div>

<script>
    const posisi = document.querySelector("#posisi");
    const slug = document.querySelector("#slug");

    posisi.addEventListener("keyup", function() {
        let preslug = posisi.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>



@endsection