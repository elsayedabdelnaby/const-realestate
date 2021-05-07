@extends('layouts.front.app')

@section('meta_tags')

@include('front.partials.meta', [
    'title' => $blog->title,
    'keywords' => $blog->meta_keywords,
    'description' => $blog->meta_description,
    'image' => $blog->image_path,
    ])

@endsection

@section('title')
{{ $blog->title }}
@endsection

@section('style')
@stop

@section('content')


     <!-- Header Container / End -->
     <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>{{ $blog->title }}</h1>
                <h2><a href="{{ route('front.index') }}">Home </a> &nbsp;/<a href="{{ route('front.blogs.index') }}">Blog</a>&nbsp; /{{ $blog->title }}</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION BLOG -->
        <section class="blog blog-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="news-item details no-mb2">
                                    <a href="{{ route('front.blogs.show', $blog->meta_slug) }}" class="news-img-link">
                                        <div class="news-item-img">
                                            <img class="img-responsive" src="{{ $blog->image_path }}" alt="{{ $blog->title }}">
                                        </div>
                                    </a>
                                    <div class="news-item-text details pb-0">
                                        <a href="{{ route('front.blogs.show', $blog->meta_slug) }}"><h3>Real Estate News</h3></a>
                                        <div class="dates">
                                            <span class="date">{{ $blog->created_at }} &nbsp;</span>
                                            {{-- <ul class="action-list pl-0">
                                                <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                                <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                                <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                            </ul> --}}
                                        </div>
                                        <div class="news-item-descr big-news details visib mb-0">
                                            <p class="mb-3">
                                                {{ $blog->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <section class="comments">
                            <h3 class="mb-5">5 Comments</h3>
                            <div class="row mb-4">
                                <ul class="col-12 commented">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="{{ asset('front') }}/images/testimonials/ts-4.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <h5 class="mb-1">Mario Smith</h5>
                                            <p class="mb-4">Jun 23, 2020</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row ml-5">
                                <ul class="col-12 commented">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="{{ asset('front') }}/images/testimonials/ts-5.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info">
                                            <h5 class="mb-1">Mary Tyron</h5>
                                            <p class="mb-4">Jun 23, 2020</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row my-4">
                                <ul class="col-12 commented">
                                    <li class="comm-inf">
                                        <div class="col-md-2">
                                            <img src="{{ asset('front') }}/images/testimonials/ts-6.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-10 comments-info no-mb">
                                            <h5 class="mb-1">Leo Williams</h5>
                                            <p class="mb-4">Jun 23, 2020</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam, quam congue dictum luctus, lacus magna congue ante, in finibus dui sapien eu dolor. Integer tincidunt suscipit erat, nec laoreet ipsum vestibulum sed.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <section class="leve-comments wpb">
                            <h3 class="mb-5">Leave a Comment</h3>
                            <div class="row">
                                <div class="col-md-12 data">
                                    <form action="#">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" id="exampleTextarea" rows="8" placeholder="Message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg mt-2">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </section> --}}
                    </div>
                    <aside class="col-lg-3 col-md-12">
                        <div class="widget">
                            <h5 class="font-weight-bold mb-4">Search</h5>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                            </div>
                            <div class="recent-post py-5">
                                <h5 class="font-weight-bold">Category</h5>
                                <ul>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>House</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Garages</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Estate</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Home</a></li>
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
