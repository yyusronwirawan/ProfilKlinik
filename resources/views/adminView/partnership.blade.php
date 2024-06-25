@extends('layout.mainAdmin')

@section('content')
<div class="pagetitle">
    <h1>Partnership</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Partnership</li>
        </ol>
    </nav>
</div>

@if(session()->has('pesan'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="/dashboard/partnership/create" class="btn btn-primary mb-3">Tambahkan Partner</a>
<div class="row">
    @foreach($partnerhip as $partner)
    <div class="col-sm">
        <div class="card" style="width: 12rem;">
            <div class="container mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <img src="{{ asset('images/partner-image/'. $partner->image) }}" class="img-fluid" width="100" title="{{$partner->nama_partner}}">
                            </th>
                            <th>
                                <form action="/dashboard/partnership/{{$partner->id}}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection