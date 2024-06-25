@extends('layout.mainAdmin')

@section('content')


<div class="pagetitle">
    <h1>Fasilitas Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Fasilitas Layanan</li>
        </ol>
    </nav>
    @if(session()->has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="/dashboard/fasilitas-layanan/create" class="btn btn-primary text-white">Tambah Fasilitas <i class="bi bi-arrow-right-short"></i></a>

</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">

                    <!-- Default Table -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="col-3">Gambar Fasilitas</th>
                                <th scope="col">Nama Fasilitas</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fasilitas as $fas)
                            <tr class="align-middle">
                                <td><img src="{{asset('images/fasilitas-layanan-image/'.$fas->image)}}" alt="" width="250"></td>
                                <td>{{$fas->nama_fasilitas}}</td>
                                <td>{{ $fas->kategori }}</td>
                                <td>

                                    <a href="/dashboard/fasilitas-layanan/{{$fas->id}}/edit" class="btn btn-primary" title="Edit Fasilitas"><i class="bi bi-pencil-square"></i></a>
                                    <form action="/dashboard/fasilitas-layanan/{{$fas->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start">
                        {{$fasilitas->links()}}
                    </div>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>

@endsection