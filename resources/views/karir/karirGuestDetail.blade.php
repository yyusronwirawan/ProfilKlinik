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
<section id="main-container" class="main-container">
    <div class="container mt-2">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">Posisi Yang di Butuhkan</h2>
                <h3 class="section-sub-title">{{ $lowongan->posisi }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title">Periode akhir penerimaan {{ $lowongan->Periode_akhir }}</h4>
                        <hr>
                        <p class="card-text">{!! $lowongan->persyaratan !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Form Lamaran Pekerjaan</h5>
                        <form action="/karir" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="error-container"></div>
                            <div class="form-group">
                                <label>Nama lengkap</label>
                                <input class="form-control " name="lowongan_id" id="lowongan_id" placeholder="" type="hidden" value="{{$lowongan->id}}">
                                <input class="form-control @error('nama_pelamar') is-invalid @enderror" name="nama_pelamar" id="nama_pelamar" placeholder="" type="text" value="{{old('nama_pelamar')}}" autofocus>
                                @error('nama_pelamar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nomor HP</label>
                                        <input class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="" type="number" value="{{old('no_hp')}}">
                                        @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="" type="email" value="{{old('email')}}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Domisili</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{{ old('alamat') }}}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mengapa kami pilih Anda</label>
                                <textarea class="form-control @error('tentang_pelamar') is-invalid @enderror" name="tentang_pelamar" id="tentang_pelamar" rows="5">{{{ old('tentang_pelamar') }}}</textarea>
                                <small class="text-muted" id="count-result">0/500</small>
                                @error('tentang_pelamar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Upload CV*</label>
                                <input class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv" placeholder="" type="file" multiple>
                                @error('cv')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="text-right"><br>
                                <button class="btn btn-primary" type="submit">Apply Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    let myText = document.getElementById("tentang_pelamar");
    myText.addEventListener("input", () => {
        let count = (myText.value).length;
        document.getElementById("count-result").textContent = `${count}/500`;
    });
</script>

@endsection