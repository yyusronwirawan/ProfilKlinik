@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Jadwal</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/dokter">Data Dokter</a></li>
            <li class="breadcrumb-item active">Edit Jadwal</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/dokter-jadwal">
        @csrf
        <h4>{{$dokter->nama}}</h4> <span class="text-muted">{{$dokter->poliklinik->poliklinik}}</span>

        <div class="mb-3 mt-3">
            <input type="hidden" class="form-control" name="dokter_id" id="dokter_id" value="{{ $dokter->id}}" autofocus>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" name="poliklinik_id" id="poliklinik_id" value="{{ $dokter->poliklinik_id}}" autofocus>
        </div>

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" class="selected-text form-control @error('hari') is-invalid @enderror" name="hari" id="hari" value="{{old('hari')}}">
            @error('hari')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="row mt-3">
            <hr>
            <div class="mb-3 col-md-6">
                <label for="dari" class="form-label">Dari jam</label>
                <input type="time" class="form-control @error('dari') is-invalid @enderror" name="dari" id="dari" value="{{old('dari')}}" autofocus>
                @error('dari')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="sampai" class="form-label">Sampai Jam</label>
                <input type="time" class="form-control @error('sampai') is-invalid @enderror" name="sampai" id="sampai" value="{{old('sampai')}}" autofocus>
                @error('sampai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Simpan jadwal</button>
        <a href="/dashboard/dokter" class="btn btn-warning">Cancel</a>
    </form>
</div>

<script>

</script>


@endsection