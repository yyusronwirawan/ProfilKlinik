@extends('layout.mainAdmin')

@section('content')
    <div class="container">
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach ($data as $banner)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/banner-image/' . $banner->image) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/banner" class="btn btn-primary mt-2">Buat Banner</a>
            </div>
        </div>

        <!-- Postingan saat ini -->
        <div class="col-md-6">
            <h5 class="widget-title">Temukan Artikel</h5>
            <form action="/dashboard/blog">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}" autofocus>
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="col mb-3">
            <a href="/blog" class="btn btn-primary text-white">Tambah Postingan Baru <i
                    class="bi bi-arrow-right-short"></i></a>
        </div>

        <section class="section">
            <div class="row">
                <div class="col">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Postingan Terbaru</h5>


                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-4">Judul Post</th>
                                        <th scope="col">Kategori Post</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Tanggal Publish</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->kategori }}</td>
                                            <td>{{ $post->user->nama }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <a href="/dashboard/blog/{{ $post->slug }}" class="btn btn-primary"
                                                    title="Detail"><i class="bi bi-eye"></i></a>
                                                <a href="/dashboard/blog/{{ $post->slug }}/edit" class="btn btn-warning"
                                                    title="Edit"><i class="bi bi-pencil-square"></i></a>

                                                <form action="/dashboard/blog/{{ $post->slug }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" title="Hapus"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-start">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- data dokter -->
        <div class="pagetitle">
            <h1>Data Dokter</h1>
        </div>
        <div class="row">
            @foreach ($dokters as $dokter)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $dokter->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dokter->nama }}</h5>
                            <p class="card-text">Poliklinik: {{ $dokter->poliklinik->poliklinik }}</p>
                            <a href="/dashboard/dokter/{{ $dokter->slug }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-start">
                {{ $dokters->links() }}
            </div>
        </div>


    </div>
@endsection
