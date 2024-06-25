@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/e-library">E-Library</a></li>
            <li class="breadcrumb-item active">Tambah Folder</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>

                    <!-- No Labels Form -->
                    <form class="row g-3" action="/dashboard/e-library/folder" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('nama_folder') is-invalid @enderror" name="nama_folder" id="nama_folder" placeholder="Nama Folder" value="{{old('nama_folder')}}" autofocus>
                            @error('nama_folder')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah Folder</button>
                            <a href="/dashboard/e-library" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection