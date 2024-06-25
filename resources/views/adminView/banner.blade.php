@extends('layout.mainAdmin')

@section('content')


<div class="pagetitle">
    <h1>Data Banner</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item active">Kelola Banner</li>
        </ol>
    </nav>

    <div class="col">
        <a href="/dashboard/banner/create" class="btn btn-primary text-white">Tambah Banner <i class="bi bi-arrow-right-short"></i></a>

    </div>

    @if(session()->has('pesan'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                    <h5 class="card-title">Banner Terbaru</h5>

                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Banner Title</th>
                                <th scope="col">tanggal Dibuat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $banner)
                            <tr>
                                <td>{{$banner->banner_title}}</td>
                                <td>{{$banner->created_at}}</td>
                                <td>
                                    <a href="/dashboard/banner/{{$banner->id}}" class="btn btn-primary" title="Detail"><i class="bi bi-eye"></i></a>
                                    <a href="/dashboard/banner/{{$banner->id}}/edit" class="btn btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>

                                    <form action="/dashboard/banner/{{$banner->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>



@endsection