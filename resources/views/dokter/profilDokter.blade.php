@extends('layout.main')

@section('content')

@php
$bgImage1 = asset('Template/images/slider-layanan/bg1.jpg');
$bgImage2 = asset('Template/images/slider-layanan/bg2.jpg');
$bgImage3 = asset('Template/images/slider-layanan/bg3.jpg');
@endphp

<div class="banner-carousel banner-carousel-1 mb-0 ">
    <div class="banner-carousel-item" style="background-image:url({{$bgImage1}});max-height: 350px; overflow:hidden;">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-center">
                        <h2 class="slide-title" data-animation-in="slideInLeft">17 Tahun Mengabdi dan</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight">melayani Masyarakat</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-carousel-item" style="background-image:url({{$bgImage2}});max-height: 350px; overflow:hidden;">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-center">
                        <h2 class="slide-title" data-animation-in="slideInLeft">Kesehatan dan kebahagiaan anda adalah</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight">Prioritas kami</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-carousel-item" style="background-image:url({{$bgImage3}});max-height: 350px; overflow:hidden;">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-center">
                        <h2 class="slide-title" data-animation-in="slideInLeft">Melayani dengan penuh</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight">Cinta dan kasih</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-title">RS Graha Hermine</h2>
            <h3 class="section-sub-title">Dokter Kami</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div id="team-slide" class="team-slide">
                @foreach($datas as $dokter)
                <div class="item">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" class="w-100" src="{{ asset('images/dokter-image/'.$dokter->image) }}" alt="team-img">
                        </div>
                        <div class="ts-team-content">
                            <p class="text-white"> <Strong>{{$dokter->nama}}</Strong></p>
                            <p class="ts-designation">{{ $dokter->poliklinik->poliklinik }}</p>
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