@extends('layout.main')

@section('content')

<section id="main-container" class="main-container">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="widget-title">Temukan Karir</h4>
                <form action="/karir">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}" autofocus>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        @if(session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col">
                @if($lowongan->count())
                @foreach($lowongan as $data)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->posisi }}</h5>
                        <p class="card-text">{{ $data->excerpt }}</p>
                        <a href="/karir/{{$data->slug}}" class="btn btn-primary">Kirim Lamaran</a>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center fs-4">Lowongan Belum Tersedia.</p>
                @endif
                <div class="d-flex justify-content-start">
                    {{$lowongan->links()}}
                </div>
            </div>
        </div>
    </div>

</section>

@endsection