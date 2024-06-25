@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Gambar Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/layanan-poliklinik">Layanan Poliklinik</a></li>
            <li class="breadcrumb-item active">Edit gambar</li>
        </ol>
    </nav>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/layananImage/{{$data->id}}" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="hidden" name="oldImage" value="{{$data->image}}">
            <input type="hidden" name="layanan_id" value="{{$data->layanan_id}}">
            @if($data->image)
            <img src="{{asset('images/layanan-poliklinik-image/'.$data->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Images</button>
    </form>
</div>




@endsection