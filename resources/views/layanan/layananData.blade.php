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
                        <h2 class="slide-title" data-animation-in="slideInLeft">Mengabdi dan</h2>
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
            <h3 class="section-sub-title">Layanan Kami</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                    <a href="/services/layanan-poliklinik" class="latest-post-img">
                        <img loading="lazy" class="img-fluid" src="{{asset('Template')}}/images/layanan/poliklinik.jpg" alt="img">
                    </a>
                </div>
                <div class="post-body">
                    <h4 class="post-title">
                        <a href="/services/layanan-poliklinik" class="d-inline-block">LAYANAN POLIKLINIK</a>
                    </h4>
                    <span>kami menyediakan layanan poliklinik yang lengkap dengan ditangani oleh dokter spesialis yang ahli</span>
                </div>
                <a href="/services/layanan-poliklinik" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-4">
            <div class="latest-post">
                <div class="latest-post-media">
                    <a href="/services/fasilitas-layanan" class="latest-post-img">
                        <img loading="lazy" class="img-fluid" src="{{asset('Template')}}/images/layanan/IGD.jpg" alt="img">
                    </a>
                </div>
                <div class="post-body">
                    <h4 class="post-title">
                        <a href="/services/fasilitas-layanan" class="d-inline-block">FASILITAS LAYANAN</a>
                    </h4>

                    <span>RS Graha Hermine menyediakan fasilitas layanan yang lengkap dan berstandar international</span>

                </div>
                <a href="/services/fasilitas-layanan" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>


@endsection