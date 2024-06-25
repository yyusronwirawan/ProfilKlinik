@extends('layout.main')

@section('content')


<div class="container mt-4">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-title">RS Graha Hermine</h2>
            <h3 class="section-sub-title">E-Library</h3>
        </div>
    </div>
    <div class="col-md-6">
        <h4 class="widget-title">Filter Buku Berdasarkan</h4>
        <form action="/e-library">
            <div class="input-group mb-3">
                <select name="search" class="form-control">
                    @foreach($folder as $fol)
                    <option value="{{ $fol->id }}">{{ $fol->nama_folder }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="row">
        @foreach($libraries as $lib)
        <div class="col-lg-4 col-md-6 mb-4 mt-4">
            <div class="latest-post">
                <div class="latest-post-media">
                    <a href="#" class="latest-post-img">
                        <img loading="lazy" class="img-fluid" src="{{asset('Template')}}/Images/document.png" alt="img" width="100">
                    </a>
                </div>
                <div class="post-body">
                    <h4 class="post-title">
                        <a href="#" class="d-inline-block">{{$lib->title}}</a>
                    </h4>
                    <span>{{$lib->penulis}} - {{$lib->tahun}}</span>
                </div>
                <a href="{{url('file/file-buku/'.$lib->file_buku)}}" class="btn btn-primary"><i class="fas fa-download"></i></a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{$libraries->links()}}
    </div>
</div>


@endsection