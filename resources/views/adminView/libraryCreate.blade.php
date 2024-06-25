@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Buku</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/e-library">E-Library</a></li>
            <li class="breadcrumb-item active">Tambah Buku</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/e-library" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title Post</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" id="penulis" value="{{old('penulis')}}" autofocus>
                @error('penulis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" id="tahun" value="{{old('tahun')}}" autofocus>
                @error('tahun')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="folder_id" class="form-label">Folder</label>
            <select name="folder_id" class="form-select">
                @foreach ($folders as $folder)
                @if(old('folder_id') == $folder->id)
                <option value="{{$folder->id}}" selected>{{ $folder->nama_folder }}</option>
                @else
                <option value="{{$folder->id}}">{{ $folder->nama_folder }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="file_buku" class="form-label">Upload File</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control  @error('file_buku') is-invalid @enderror" type="file" id="file_buku" name="file_buku">
            @error('file_buku')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Buku</button>
    </form>
</div>




@endsection