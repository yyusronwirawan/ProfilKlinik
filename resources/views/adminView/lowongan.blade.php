@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Data Lowongan Aktif</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Lowongan Karir</li>
        </ol>
    </nav>

    <div class="col-md-6">
        <h5 class="widget-title">Cari Lowongan</h5>
        <form action="/dashboard/lowongan">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}" autofocus>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="col">
        <a href="/dashboard/lowongan/create" class="btn btn-primary text-white">Tambah Lowongan <i class="bi bi-arrow-right-short"></i></a>

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
                                <th scope="col">Posisi</th>
                                <th scope="col">tanggal Dibuat</th>
                                <th scope="col">Periode Akhir Lowongan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $lowongan)
                            <tr>
                                <td>{{$lowongan->posisi}}</td>
                                <td>{{$lowongan->created_at}}</td>
                                <td>{{$lowongan->periode_akhir}}</td>
                                <td>
                                    <a href="/dashboard/lowongan/{{$lowongan->slug}}" class="btn btn-success" title="Detail Lowongan"><i class="bi bi-eye"></i></a>
                                    <a href="/dashboard/lamaran/{{$lowongan->slug}}" class="btn btn-warning" title="Daftar pelamar"><i class="bi bi-bag-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start">
                        {{$data->links()}}
                    </div>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>



@endsection