@extends('layout.mainAdmin')

@section('content')


<div class="pagetitle">
    <h1>Banner Show</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/dashboard/banner">Kelola Banner</a></li>
            <li class="breadcrumb-item active">Banner Show</li>
        </ol>
    </nav>
    <div class="col">
        <a href="/dashboard/banner/{{$data->id}}/edit" class="btn btn-primary text-white">Edit Banner <i class="bi bi-pencil-square"></i></a>
        <form action="/dashboard/banner/{{$data->id}}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus <i class="bi bi-trash"></i></button>
        </form>
    </div>

</div><!-- End Page Title -->

<span>
    <h5 class="card-title">{{ $data->banner_title }}</h5>
</span>
<img src="{{ asset('images/banner-image/'.$data->image) }}" class="img-fluid" alt="...">



@endsection