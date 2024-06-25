@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Edit Data Dokter</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/dokter">Data Dokter</a></li>
            <li class="breadcrumb-item active">Edit data</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/dokter/{{$dokter->slug}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama', $dokter->nama)}}" autofocus>
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <span class="text-danger">*automatic fill</span>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug', $dokter->slug)}}">
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
                    <option value="{{ $dokter->jenis_kelamin }}" selected>
                        @if($dokter->jenis_kelamin == 'P')
                        Perempuan
                        @else
                        Laki-Laki
                        @endif
                    </option>

                    @if($dokter->jenis_kelamin == 'L')
                    <option value="L">Laki-Laki</option>
                    @else
                    <option value="P">Perempuan</option>
                    @endif
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{old('no_hp', $dokter->no_hp)}}" autofocus>
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
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{old('tanggal_lahir', $dokter->tanggal_lahir)}}" autofocus>
                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email', $dokter->email)}}" autofocus>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
            <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" id="alamat_domisili" value="{{old('alamat_domisili', $dokter->alamat_domisili)}}" autofocus>
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
                    @if(old('poliklinik_id', $dokter->poliklinik_id) == $poli->id)
                    <option value="{{$poli->id}}" selected>{{ $poli->poliklinik }}</option>
                    @else
                    <option value="{{$poli->id}}">{{ $poli->poliklinik }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="specialis" class="form-label">Sub-Specialist</label>
                <input type="specialis" class="form-control @error('specialis') is-invalid @enderror" name="specialis" id="specialis" value="{{old('specialis', $dokter->specialis)}}" autofocus>
                @error('specialis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="hidden" name="oldImage" value="{{$dokter->image}}">

            @if($dokter->image)
            <img src="{{asset('images/dokter-image/'.$dokter->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="riwayat" class="form-label">Riwayat Dokter</label>
            <input id="riwayat" type="hidden" name="riwayat" value="{{old('riwayat', $dokter->riwayat)}}">
            <trix-editor input="riwayat"></trix-editor>
            @error('riwayat')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
</div>




@endsection