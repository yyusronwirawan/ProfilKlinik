@extends('layout.mainAdmin')

@section('content')


<div class="pagetitle">
    <h1>Layanan Poliklinik</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Layanan Poliklinik</li>
        </ol>
    </nav>
    @if(session()->has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="/dashboard/layanan-poliklinik/create" class="btn btn-primary text-white">Tambah layanan <i class="bi bi-arrow-right-short"></i></a>
    <a href="/dashboard/layananImage" class="btn btn-secondary text-white">Kelola Gambar Layanan <i class="bi bi-arrow-right-short"></i></a>

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
                                <th scope="col">Poliklinik</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($poliklinik as $poli)
                            <tr>
                                <td>{{$poli->poliklinik}}</td>
                                <td>

                                    <a href="/dashboard/layanan-poliklinik/{{$poli->slug}}/edit" class="btn btn-primary" title="Edit Layanan"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/dashboard/layanan-poliklinik/{{$poli->slug}}" class="btn btn-warning" title="Tambah gambar poliklinik"><i class="bi bi-images"></i></a>
                                    <a href="/dashboard/layanan/detail/{{$poli->slug}}" class="btn btn-success" title="Detail Layanan"><i class="bi bi-eye"></i></a>
                                    <form action="/dashboard/layanan-poliklinik/{{$poli->slug}}" method="POST" class="d-inline">
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
                        {{$poliklinik->links()}}
                    </div>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>

@endsection