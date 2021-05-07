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
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; Blog</h2>
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
                        @foreach($blogs as $blog)
                            <div class="col-md-12 col-xs-12 space no-pb2">
                            <div class="news-item news-item-sm">
                                <a href="#" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="resp-img" src="{{ $blog -> image_path }}" alt="{{ $blog -> title }}">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="blog-details.html">
                                        <h3>{{ $blog -> title }}</h3>
                                    </a>
                                    <div class="dates">
                                        <span class="date">{{ $blog->created_at->isoFormat('D MMMM Y') }} / </span>
                                        <ul class="action-list pl-0">
                                            <li class="action-item pl-2"><i class="fa fa-heart"></i>
                                                <span>306</span></li>
                                            <li class="action-item"><i class="fa fa-comment"></i> <span>34</span>
                                            </li>
                                            <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="news-item-descr">
                                        <p>{!! html_entity_decode( $blog -> description ) !!}</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="#" class="news-link">Read more...</a>
                                        <div class="admin">
                                            <p>Created By: {{ $blog -> creator }}</p>
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
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"
                                                                                     aria-hidden="true"></i></button>
                                </span>
                        </div>
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
                            <h5 class="font-weight-bold mb-4">Popolar Tags</h5>
                            <div class="tags">
                                <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                                <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                            </div>
                            <div class="tags">
                                <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                                <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                            </div>
                            <div class="tags">
                                <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                                <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                            </div>
                            <div class="tags">
                                <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                                <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                            </div>
                            <div class="tags">
                                <span><a href="#" class="btn btn-outline-primary mb-0">Location</a></span>
                                <span><a href="#" class="btn btn-outline-primary mb-0">Price</a></span>
                            </div>
                        </div>
                        <div class="recent-post pt-5">
                            <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('front') }}/images/blog/b-1.jpg" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html">
                                        <h6>Real Estate</h6>
                                    </a>
                                    <p>May 10, 2020</p>
                                </div>
                            </div>
                            <div class="recent-main my-4">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('front') }}/images/blog/b-2.jpg" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html">
                                        <h6>Real Estate</h6>
                                    </a>
                                    <p>May 10, 2020</p>
                                </div>
                            </div>
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('front') }}/images/blog/b-3.jpg" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html">
                                        <h6>Real Estate</h6>
                                    </a>
                                    <p>May 10, 2020</p>
                                </div>
                            </div>
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