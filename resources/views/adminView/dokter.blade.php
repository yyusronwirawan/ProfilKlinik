@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Data Dokter</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Dokter</li>
        </ol>
    </nav>

    <div class="col-md-6">
        <h5 class="widget-title">Cari Dokter</h5>
        <form action="/dashboard/dokter">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}" autofocus>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="col">
        <a href="/dashboard/dokter/create" class="btn btn-primary text-white">Tambah Data <i class="bi bi-arrow-right-short"></i></a>
        <!-- <a href="/dashboard/jadwal/create" class="btn btn-dark text-white">Buat Jadwal Dokter<i class="bi bi-arrow-right-short"></i></a> -->

    </div>

    @if(session()->has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dokters as $dokter)
                            <tr class="align-middle">
                                <td><img src="{{ asset('images/dokter-image/'.$dokter->image) }}" alt="" width="100"></td>
                                <td>{{$dokter->nama}}</td>
                                <td>{{$dokter->jenis_kelamin}}</td>
                                <td>{{$dokter->no_hp}}</td>
                                <td>{{$dokter->email}}</td>
                                <td>
                                    <a href="/dashboard/dokter-jadwal/{{$dokter->slug}}" class="btn btn-dark" title="Tambah Jadwal"><i class="bi bi-calendar-plus"></i></a>
                                    <a href="/dashboard/dokter/{{$dokter->slug}}" class="btn btn-primary" title="Detail"><i class="bi bi-eye"></i></a>
                                    <a href="/dashboard/dokter/{{$dokter->slug}}/edit" class="btn btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>

                                    <form action="/dashboard/dokter/{{$dokter->slug}}" method="POST" class="d-inline">
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
                        {{$dokters->links()}}
                    </div>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>



@endsection