@extends('layout.main')

@section('content')

<section id="main-container" class="main-container">


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="widget-title">Temukan Artikel</h3>
                <form action="/artikel">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}" autofocus>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-8 mb-5 mb-lg-0">
                @if($posts->count())
                @foreach($posts as $post)
                <div class="post">
                    <div class="post-media post-image">
                        <img loading="lazy" src="{{asset('images/blog-image/'.$post->image)}}" class="img-fluid" alt="post-image">
                    </div>


                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-author"><i class="far fa-user"></i>{{ $post->user->nama }}</span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i>{{$post->created_at}}</span>
                                <!-- <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#" class="comments-link">Comments</a></span> -->
                            </div>
                            <h2 class="entry-title">
                                <a href="/artikel/{{$post->slug}}">{{ $post->title }}</a>
                            </h2>
                        </div>

                        <div class="entry-content">
                            <p>{{$post->excerpt}}</p>
                        </div>

                        <div class="post-footer">
                            <a href="/artikel/{{$post->slug}}" class="btn btn-primary">Selengkapnya</a>
                        </div>

                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center fs-4">Artikel Tidak Ada.</p>
                @endif


                <div class="d-flex justify-content-start">
                    {{$posts->links()}}
                </div>


            </div><!-- Content Col end -->

            <div class="col-lg-4">

                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="list-unstyled">
                            @foreach($posts as $post)
                            <li class="d-flex align-items-center">
                                <div class="posts-thumb">
                                    <a href="/artikel/{{$post->slug}}"><img loading="lazy" alt="img" style="height: 50px; Width: 80px;" src="{{ asset('images/blog-image/'.$post->image) }}"></a>
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

                    <!-- <div class="widget">
                        <h3 class="widget-title">Categories</h3>
                        @foreach($categories as $category)
                        <ul class="arrow nav nav-tabs">
                            <li><a href="/blogGuest?category={{$category->slug}}">{{ $category->kategori }}</a></li>
                        </ul>
                        @endforeach
                    </div> -->


                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->

@endsection