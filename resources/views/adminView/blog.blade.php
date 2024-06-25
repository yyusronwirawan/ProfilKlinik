@extends('layout.mainAdmin')

@section('content')
<!-- @if(Session::has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif -->

<div class="pagetitle">
    <h1>Data Post</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item active">RSGH Blog</li>
        </ol>
    </nav>

    <div class="col-md-6">
        <h5 class="widget-title">Temukan Artikel</h5>
        <form action="/dashboard/blog">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}" autofocus>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="col">
        <a href="/blogCreate" class="btn btn-primary text-white">Tambah Post <i class="bi bi-arrow-right-short"></i></a>
        <a href="/blogCategory" class="btn btn-secondary text-white">Tambah Category Post <i class="bi bi-arrow-right-short"></i></a>

    </div>

    @if(session()->has('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>

<section class="section">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Postingan Terbaru</h5>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="col-4">Judul Post</th>
                                <th scope="col">Kategori Post</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">tanggal Publish</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->kategori }}</td>
                                <td>{{ $post->user->nama }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a href="/dashboard/blog/{{$post->slug}}" class="btn btn-primary" title="Detail"><i class="bi bi-eye"></i></a>
                                    <a href="/dashboard/blog/{{$post->slug}}/edit" class="btn btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>

                                    <form action="/dashboard/blog/{{$post->slug}}" method="POST" class="d-inline">
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
                        {{$posts->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection