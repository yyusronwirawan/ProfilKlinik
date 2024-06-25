@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-8 mb-5 mb-lg-0">

            <div class="post-content post-single">
                <div class="post-media post-image">
                    <img loading="lazy" src="{{asset('images/blog-image/'.$data->image)}}" class="img-fluid mt-3" alt="post-image">
                </div>

                <div class="post-body">
                    <div class="entry-header">
                        <div class="post-meta">
                            <span class="post-author">
                                <i class="fas fa-user"></i>{{ $data->user->nama }}
                            </span>
                            <span class="post-meta-date"><i class="far fa-calendar"></i>{{$data->created_at}}</span>
                        </div>
                        <h2 class="entry-title">

                        </h2>
                    </div>

                    <div class="entry-content">
                        {!! $data->body !!}
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-4 mt-3">

            <div class="sidebar sidebar-right">
                <div class="widget recent-posts">
                    <h3 class="widget-title">Recent Posts</h3>
                    <ul class="list-unstyled">
                        @foreach($recents as $post)
                        <li class="d-flex align-items-center">
                            <div class="posts-thumb">
                                <a href="/artikel/{{$post->slug}}"><img loading="lazy" alt="img" src="{{ asset('images/blog-image/'.$post->image) }}" style="height: 50px; Width: 80px;"></a>
                            </div>
                            <div class="post-info">
                                <h4 class="entry-title">
                                    <a href="/artikel/{{$post->slug}}">{{$post->title}}</a>
                                </h4>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                </div>
            </div><!-- Main row end -->
        </div>
    </div>
</div>

@endsection