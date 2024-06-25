@extends('layout.main')

@section('content')


<div class="container mt-4">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-title">RS Graha Hermine</h2>
            <h3 class="section-sub-title">Fasilitas Layanan Kami</h3>
        </div>
    </div>
    <div class="col-md-6">
        <h4 class="widget-title">Filter Fasilitas Berdasarkan</h4>
        <form action="/services/fasilitas-layanan">
            <div class="input-group mb-3">
                <select name="search" class="form-control">
                    <option value="Fasilitas Layanan Kesehatan">Fasilitas Layanan Kesehatan</option>
                    <option value="Fasilitas Penunjang Medis">Fasilitas Penunjang Medis</option>
                    <option value="Fasilitas Layanan Unggulan">Fasilitas Layanan Unggulan</option>
                </select>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="row">
        @foreach($fasilitas as $fas)
        <div class="col-lg-4 col-md-6 mb-4 mt-4">
            <div class="latest-post">
                <div class="latest-post-media">
                    <a href="#" class="latest-post-img">
                        <img loading="lazy" class="img-fluid" src="{{asset('images/fasilitas-layanan-image/'.$fas->image)}}" alt="img">
                    </a>
                </div>
                <div class="post-body">
                    <h4 class="post-title">
                        <a href="#" class="d-inline-block">{{ $fas->nama_fasilitas }}</a>
                    </h4>
                    <span>{!! $fas->ket !!}</span>
                </div>
                <!-- <a href="#" class="btn btn-primary">Selengkapnya</a> -->
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{$fasilitas->links()}}
    </div>
</div>


@endsection