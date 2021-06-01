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
                <h1>@lang('front.blog')</h1>
                <h2><a href="{{ route('front.index') }}">@lang('front.home') </a> &nbsp;/&nbsp; @lang('front.blog')</h2>
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
                        @forelse ($blogs as $blog)
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
                                                class="news-link">@lang('front.read_more')...</a>
                                            <div class="admin">
                                                <p>@lang('front.created_by'): {{ $blog->creator }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
                <aside class="col-lg-3 col-md-12">
                    <div class="widget">
                        <h5 class="font-weight-bold mb-4">@lang('front.search')</h5>
                        <form action="{{route('front.blogs.index')}}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search_keyword" class="form-control" placeholder="@lang('front.search_for')..." value="{{app('request')->search_keyword}}">
                                @if(app('request')->category)
                                <input type="hidden" name="category" class="form-control" value="{{app('request')->category}}">
                                @endif
                                @if(app('request')->tag)
                                <input type="hidden" name="tag" class="form-control" value="{{app('request')->tag}}">
                                @endif
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </form>
                        <div class="recent-post py-5">
                            @include('front.includes.categories', ['categories'])
                        </div>
                        <div class="recent-post">
                            @include('front.includes.popolar_tags', ['popular_tags'])
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
