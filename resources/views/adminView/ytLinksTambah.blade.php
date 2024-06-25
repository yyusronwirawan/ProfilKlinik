@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Video Link</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/yt">Link Video YouTube</a></li>
            <li class="breadcrumb-item active">Tambah Link</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>

                    <!-- No Labels Form -->
                    <form class="row g-3" action="/dashboard/yt" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="masukan title.." value="{{old('title')}}" autofocus>
                            @error('embed_link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('embed_link') is-invalid @enderror" name="embed_link" id="embed_link" placeholder="masukan embed link.." value="{{old('embed_link')}}" autofocus>
                            @error('embed_link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/dashboard/yt" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection