@extends('layout.main')

@section('content')

<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg">
                <h2 class="section-title">RS Graha Hermine</h2>
                <h3 class="section-sub-title">Our Partnership</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row all-clients">
                    @foreach($partnership as $partner)
                    <div class="col-sm-2 col-6">
                        <figure class="clients-logo">
                            <a href="#"><img loading="lazy" class="img-fluid" src="{{asset('storage/'.$partner->image)}}" alt="clients-logo" title="{{$partner->nama_partner}}" /></a>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection