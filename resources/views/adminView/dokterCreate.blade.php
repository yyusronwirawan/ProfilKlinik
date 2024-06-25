@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Data Dokter</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/dokter">Data Dokter</a></li>
            <li class="breadcrumb-item active">Tambah data</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/dokter" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama')}}" autofocus>
            @error('nama')
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
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="Laki-Laki" @if (old('jenis_kelamin')=='Laki-Laki' ) selected="selected" @endif>Laki-Laki</option>
                    <option value="Perempuan" @if (old('jenis_kelamin')=='Perempuan' ) selected="selected" @endif>Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{old('no_hp')}}" autofocus>
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{old('tanggal_lahir')}}" autofocus>
                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" autofocus>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
            <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" id="alamat_domisili" value="{{old('alamat_domisili')}}" autofocus>
            @error('alamat_domisili')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="poliklinik" class="form-label">Poliklinik</label>
                <select name="poliklinik_id" class="form-select">
                    @foreach ($poliklinik as $poli)
                    @if(old('poliklinik_id') == $poli->id)
                    <option value="{{$poli->id}}" selected>{{ $poli->poliklinik }}</option>
                    @else
                    <option value="{{$poli->id}}">{{ $poli->poliklinik }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="specialis" class="form-label">Sub Specialist</label>
                <input type="specialis" class="form-control @error('specialis') is-invalid @enderror" name="specialis" id="specialis" value="{{old('specialis')}}" autofocus>
                @error('specialis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
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
        <div class="mb-3">
            <label for="riwayat" class="form-label">Riwayat Dokter</label>
            <input id="riwayat" type="hidden" name="riwayat" value="{{old('riwayat')}}">
            <trix-editor input="riwayat"></trix-editor>
            @error('riwayat')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>

<script>
    const nama = document.querySelector("#nama");
    const slug = document.querySelector("#slug");

    nama.addEventListener("keyup", function() {
        let preslug = nama.value;
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