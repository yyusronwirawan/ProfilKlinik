@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/layanan">Layanan</a></li>
            <li class="breadcrumb-item active">Create Layanan</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/layanan/{{$layanan->slug}}">
        @method('put')
        @csrf
        <div class="mb-3 col-md-6">
            <label for="jenis_layanan" class="form-label">Layanan</label>
            <select name="jenis_layanan" class="form-select">
                @if($layanan->jenis_layanan == 'igd')
                <option value="{{$layanan->jenis_layanan}}" selected>Instalasi gawat Darurat (IGD)</option>
                @else
                <option value="{{$layanan->jenis_layanan}}" selected>{{ $layanan->jenis_layanan }}</option>
                @endif
            </select>
            @error('hari')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_layanan" class="form-label">jenis Lainnya</label>
            <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror" name="nama_layanan" id="nama_layanan" value="{{old('nama_layanan',$layanan->nama_layanan)}}" autofocus>
            @error('nama_layanan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <span class="text-danger">*automatic fill</span>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug',$layanan->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <input id="ket" type="hidden" name="ket" value="{{old('ket',$layanan->ket)}}">
            <trix-editor input="ket"></trix-editor>
            @error('ket')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Layanan</button>
    </form>
</div>

<script>
    const nama_layanan = document.querySelector("#nama_layanan");
    const slug = document.querySelector("#slug");

    nama_layanan.addEventListener("keyup", function() {
        let preslug = nama_layanan.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>


@endsection