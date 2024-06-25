@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Poliklinik</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/layanan-poliklinik">Layanan Poliklinik</a></li>
            <li class="breadcrumb-item active">Buat Layanan</li>
        </ol>
    </nav>
</div>
<form method="POST" action="/dashboard/layanan-poliklinik">
    @csrf
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="poliklinik" class="form-label">Nama Poliklinik</label>
                <input type="text" class="form-control @error('poliklinik') is-invalid @enderror" name="poliklinik" id="poliklinik" value="{{old('poliklinik')}}" autofocus>
                @error('poliklinik')
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

            <div class="col mb-3 mt-3">
                <label for="ket" class="form-label">Keterangan</label>
                <input id="ket" type="hidden" name="ket" value="{{old('ket')}}">
                <trix-editor input="ket"></trix-editor>
                @error('ket')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Buat Poliklinik</button>
        </div>
    </div>

</form>

<script>
    const poliklinik = document.querySelector("#poliklinik");
    const slug = document.querySelector("#slug");

    poliklinik.addEventListener("keyup", function() {
        let preslug = poliklinik.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>


@endsection