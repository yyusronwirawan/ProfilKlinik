@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Detail layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/layanan-poliklinik">Layanan Poliklinik</a></li>
            <li class="breadcrumb-item active">Detail Layanan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row align-items-top">
        <h2>{{$layanan->poliklinik}}</h2>

        <div class="row">
            @foreach($images as $image)
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                    <img src="{{asset('storage/'.$image->image)}}" alt="" class="w-100">
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keterangan</h5>
                        <p class="card-text">{!! $layanan->ket !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection