@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Kelola gambar layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/layanan-poliklinik">Layanan Poliklinik</a></li>
            <li class="breadcrumb-item active">Kelola gambar</li>
        </ol>
    </nav>
    @if(session()->has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="row">
    @foreach($data as $images)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('images/layanan-poliklinik-image/'.$images->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><small class="text-muted">Nama layanan:</small><br> {{ $images->layanan->poliklinik }}</h5>
                <a href="/dashboard/layananImage/{{$images->id}}/edit" class="btn btn-primary d-inline" title="Edit Gambar"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/layananImage/{{$images->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" title="Hapus Gambar" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection