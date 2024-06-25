@extends('layout.main')

@section('content')

<div class="container mt-4">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-sub-title">{{ $poliklinik->poliklinik }}</h2>
        </div>
    </div>

    <div class="row mt-4">
        @foreach($images as $image)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                <img src="{{asset('images/layanan-poliklinik-image/'.$image->image)}}" alt="" class="w-100">
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    {!! $poliklinik->ket !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mb-3">
        <div class="col-12">
            <h2 class="section-title">Dokter Poliklinik</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div id="team-slide" class="team-slide">
                @foreach($dokters as $dokter)
                <div class="item">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" class="w-100" src="{{ asset('images/dokter-image/'.$dokter->image) }}" alt="team-img">
                        </div>
                        <div class="ts-team-content">
                            <p class="text-white"> <Strong>{{$dokter->nama}}</Strong></p>
                            <div class="team-social-icons">
                                <a class="btn btn-primary" href="/dokter/profil/{{$dokter->slug}}"><small class="text-small">Lihat Jadwal</small> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection