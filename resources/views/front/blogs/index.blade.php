@extends('layouts.front.app')

@section('style')
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('front/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/lightcase.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/styles.css">
    <link rel="stylesheet" id="color" href="{{ asset('front/') }}/css/default.css">

@stop

@section('content')


    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Blog</h1>
                <h2><a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Blog</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION BLOG -->
    <section class="blog blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-xs-12">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-12 col-xs-12 space no-pb2">
                                <div class="news-item news-item-sm">
                                    <a href="{{ route('front.blogs.show', $blog->meta_slug) }}" class="news-img-link">
                                        <div class="news-item-img">
                                            <img class="resp-img" src="{{ $blog->image_path }}"
                                                alt="{{ $blog->title }}">
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a href="{{ route('front.blogs.show', $blog->meta_slug) }}">
                                            <h3>{{ $blog->title }}</h3>
                                        </a>
                                        <div class="dates">
                                            <span class="date">{{ $blog->created_at->format('M d, Y') }} </span>
                                            {{-- <ul class="action-list pl-0">
                                            <li class="action-item pl-2"><i class="fa fa-heart"></i>
                                                <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span>
                                            </li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span>
                                            </li>
                                        </ul> --}}
                                        </div>
                                        <div class="news-item-descr">
                                            <p>{!! html_entity_decode($blog->description) !!}</p>
                                        </div>
                                        <div class="news-item-bottom">
                                            <a href="{{ route('front.blogs.show', $blog->meta_slug) }}"
                                                class="news-link">Read more...</a>
                                            <div class="admin">
                                                <p>Created By: {{ $blog->creator }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <aside class="col-lg-3 col-md-12">
                    <div class="widget">
                        <h5 class="font-weight-bold mb-4">Search</h5>
                        <form action="" action="GET">
                            @csrf
                            @method('GET')
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </form>
                        <div class="recent-post py-5">
                            <h5 class="font-weight-bold">Category</h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>House</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Garages</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Estate</a>
                                </li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Home</a>
                                </li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Bath</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Beds</a></li>
                            </ul>
                        </div>
                        <div class="recent-post">
                            @include('front.includes.popolar_tags')
                        </div>
                        <div class="recent-post pt-5">
                            @include('front.blogs.recent_posts', ['recent_blogs'])
                        </div>
                    </div>
                </aside>
            </div>

            {{ $blogs->appends(request()->query())->links() }}

        </div>
    </section>
    <!-- END SECTION BLOG -->

@endsection

@section('script')
    <!-- ARCHIVES JS -->
    <!-- ARCHIVES JS -->
    <script src="{{ asset('front/') }}/js/jquery.min.js"></script>
    <script src="{{ asset('front/') }}/js/tether.min.js"></script>
    <script src="{{ asset('front/') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('front/') }}/js/mmenu.min.js"></script>
    <script src="{{ asset('front/') }}/js/mmenu.js"></script>
    <script src="{{ asset('front/') }}/js/smooth-scroll.min.js"></script>
    <script src="{{ asset('front/') }}/js/ajaxchimp.min.js"></script>
    <script src="{{ asset('front/') }}/js/newsletter.js"></script>
    <script src="{{ asset('front/') }}/js/color-switcher.js"></script>
    <script src="{{ asset('front/') }}/js/inner.js"></script>
@stop
