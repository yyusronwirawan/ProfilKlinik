@extends('layout.main')

@section('content')

<div class="container mt-4">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-title">RS Graha Hermine</h2>
            <h3 class="section-sub-title">Layanan Poliklinik</h3>
        </div>
    </div>
    <div class="row">
        @foreach($poliklinik as $poli)
        <div class="col-md-6">
            <div class="card text-center mb-3">
                <div class="card-header">
                    POLIKLINIK
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $poli->poliklinik }}</h3>
                    <p class="card-text">{!! $poli->ket !!}</p>
                    <a href="/services/layanan-poliklinik/detail/{{$poli->slug}}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection