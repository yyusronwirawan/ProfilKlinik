@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Galeri</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
    </nav>

    <div class="col">
        <a href="/dashboard/galeri/create" class="btn btn-primary text-white">Tambah Foto <i class="bi bi-arrow-right-short"></i></a>
        <a href="/dashboard/galeri-kategori/create" class="btn btn-warning text-white">Tambah Kategori Foto<i class="bi bi-arrow-right-short"></i></a>

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
                                <th scope="col">Gambar</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Title</th>
                                <th scope="col">Tanggal di buat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galeri as $data)
                            <tr class="align-middle">
                                <td><img src="{{ asset('images/galeri-image/'.$data->image) }}" alt="" width="200"></td>
                                <td>{{$data->kategori->galeri_kategori}}</td>
                                <td>{{$data->title_galeri}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>

                                    <!-- <button type="button" class="btn btn-primary" title="Tentang Pelamar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-eye"></i>
                                    </button> -->

                                    <!-- modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Gambar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid" alt="$data->title_galeri }}">
                                                    <p>{!! $data->keterangan !!}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- endmodal -->

                                    <form action="/dashboard/galeri/{{$data->id}}" method="POST" class="d-inline">
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
                        {{ $galeri->links() }}
                    </div>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
</section>

@endsection