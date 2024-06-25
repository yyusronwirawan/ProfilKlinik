@extends('layout.mainAdmin')

@section('content')

<div class="pagetitle">
    <h1>Tambah Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item">Media</li>
            <li class="breadcrumb-item"><a href="/blog">RSGH Blog</a></li>
            <li class="breadcrumb-item active">Detail Post</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row align-items-top">
        <div class="col">
            <div class="card">
                @if($data->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{asset('images/blog-image/'.$data->image)}}" class="card-img-top">
                </div>
                @else
                <img src="{{asset('TemplateAdmin')}}/assets/img/card.jpg" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $data->title }}</h5>
                    <p class="card-text">{!! $data->body !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection