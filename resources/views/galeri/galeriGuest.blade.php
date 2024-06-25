@extends('layout.main')

@section('content')

<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">RS Graha Hermine</h2>
                <h3 class="section-sub-title">Gallery</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <!-- galeri -->
        <div class="row">

            <div class="col-md-6">
                <h4 class="widget-title">Filter Foto Berdasarkan</h4>
                <form action="/galeri">
                    <div class="input-group mb-3">
                        <select name="search" class="form-control">
                            @foreach($kategories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->galeri_kategori }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>
                    @foreach($galeris as $galeri)

                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;Poliklinik&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="{{ asset('images/galeri-image/'.$galeri->image) }}" aria-label="project-img">
                                <img class="img-fluid" src="{{ asset('images/galeri-image/'.$galeri->image) }}" alt="project-img" style="max-height:350px ; overflow:hidden;">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <p class="project-item-title text-white">{{ $galeri->title_galeri }}</a>
                                    </p>
                                    <span class="text-white"><small>{!! $galeri->keterangan !!}</small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div><!-- shuffle end -->
            </div>

        </div><!-- Content row end -->
        <div class="d-flex justify-content-center mt-4">
            {{$galeris->links()}}
        </div>
    </div>
    <!--/ Container end -->
</section><!-- Project area end -->

@endsection