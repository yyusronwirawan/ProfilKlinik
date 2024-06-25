@extends('layout.mainAdmin')

@section('content')


<div class="pagetitle">
    <h1>Data Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">E-Library</li>
        </ol>
    </nav>

    <div class="col-md-6">
        <h5 class="widget-title">Temukan Buku</h5>
        <form action="/dashboard/e-library">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}" autofocus>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    @if(Session::has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="/dashboard/e-library/folder/create" class="btn btn-primary text-white">Buat Folder <i class="bi bi-arrow-right-short"></i></a>

    <a href="/dashboard/e-library/create" class="btn btn-secondary text-white">Tambah Buku <i class="bi bi-arrow-right-short"></i></a>

</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Buku</h5>

                    <!-- Default Table -->
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col" class="col-5">Title</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr class="align-middle">
                                <td>{{$book->title}}</td>
                                <td>{{$book->penulis}}</td>
                                <td>{{$book->tahun}}</td>
                                <td>{{$book->folder->nama_folder}}</td>
                                <td>
                                    <a href="/file/file-buku/{{$book->file_buku}}"><button class="btn btn-secondary" title="Download Buku"><i class="bi bi-download"></i></button></a>
                                    <form action="/dashboard/e-library/{{$book->id}}" method="POST" class="d-inline">
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
                        {{$books->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection