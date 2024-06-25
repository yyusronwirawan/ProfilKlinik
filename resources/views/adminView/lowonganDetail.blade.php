@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/lowongan">Data Lowongan</a></li>
            <li class="breadcrumb-item active">Detail Lowongan</li>
        </ol>
    </nav>
</div>
<div class="card w-75">
    <div class="card-body">
        <h5 class="card-title">{{ $data->posisi }}</h5>
        <p class="text-muted">Periode Akhir Lowongan {{$data->periode_akhir}}</p>
        <p class="card-text">{!! $data->persyaratan !!}</p>
        <a href="/dashboard/lowongan" class="btn btn-secondary">Kembali</a>
        <a href="/dashboard/lowongan/{{$data->slug}}/edit" class="btn btn-primary">Edit Lowongan</a>
        <form action="/dashboard/lowongan/{{$data->slug}}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
        </form>
    </div>
</div>

@endsection