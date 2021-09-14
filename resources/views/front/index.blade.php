@extends('layouts.front.app')

@section('meta_tags')

    @include('front.partials.meta', [
    'title' => $site_settings->title,
    'keywords' => $site_settings->meta_keyword,
    'description' => $site_settings->meta_description,
    'image' => $site_settings->logo_path,
    ])

@endsection

@section('title')
    {{ $site_settings->title }}
@endsection

@section('style')
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet.markercluster.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet.markercluster.default.css">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/front/') }}/revolution//css/settings.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/revolution//css/layers.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/revolution//css/navigation.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/slick.css">
@stop

@section('content')

    <!-- STAR HEADER SEARCH -->
    <section id="hero-area" class="parallax-searchs home17 overlay" data-stellar-background-ratio="0.5">
        <div class="hero-main">
            <div class="container">
                <div class="banner-inner-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-inner">
                                <h1 class="title text-center">@lang('front.Find Your Dream Home')</h1>
                                <h5 class="sub-title text-center">@lang('front.We Have Over Million Properties For
                                    You')</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="banner-search-wrap">
                                <ul class="nav nav-tabs rld-banner-tab">
                                    <li class="nav-item">
                                        <a class="nav-link  active" data-toggle="tab" href="#">@lang('front.For
                                            Sale')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#">@lang('front.For
                                            Rent')</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="for_sale">
                                        <form action="{{ route('front.properties.index', ['rent_sale' => 0]) }}"
                                            method="GET">
                                            <div class="rld-main-search">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select left-icon">
                                                            <select name="agency_id" class="select single-select">
                                                                <option value="">@lang('front.Agency')</option>
                                                                @foreach ($agencies as $agency)
                                                                    <option value="{{ $agency->id }}"
                                                                        {{ request()->agency_id == $agency->id ? 'selected' : '' }}>
                                                                        {{ $agency->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select">
                                                            <select name="property_type" class="select single-select">
                                                                <option value="">@lang('front.property_type')</option>
                                                                @foreach ($property_types as $property_type)
                                                                    <option value="{{ $property_type->id }}"
                                                                        {{ request()->property_type == $property_type->id ? 'selected' : '' }}>
                                                                        {{ $property_type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <div class="rld-single-select">
                                                            <select name="property_status" class="select single-select">
                                                                <option value="">@lang('front.property_status')</option>
                                                                @foreach ($property_statuses as $property_status)
                                                                    <option value="{{ $property_status->id }}"
                                                                        {{ request()->property_status == $property_type->id ? 'selected' : '' }}>
                                                                        {{ $property_status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <button type="submit"
                                                            class="btn btn-yellow">@lang('front.search')</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="for_rent">
                                        <form action="{{ route('front.properties.index', ['rent_sale' => 1]) }}"
                                            method="GET">
                                            <div class="rld-main-search">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select left-icon">
                                                            <select name="agency_id" class="select single-select">
                                                                <option value="">@lang('front.Agency')</option>
                                                                @foreach ($agencies as $agency)
                                                                    <option value="{{ $agency->id }}"
                                                                        {{ request()->agency_id == $agency->id ? 'selected' : '' }}>
                                                                        {{ $agency->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select">
                                                            <select name="property_type" class="select single-select">
                                                                <option value="">@lang('front.property_type')</option>
                                                                @foreach ($property_types as $property_type)
                                                                    <option value="{{ $property_type->id }}"
                                                                        {{ request()->property_type == $property_type->id ? 'selected' : '' }}>
                                                                        {{ $property_type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <div class="rld-single-select">
                                                            <select name="property_status" class="select single-select">
                                                                <option value="">@lang('front.property_status')</option>
                                                                @foreach ($property_statuses as $property_status)
                                                                    <option value="{{ $property_status->id }}"
                                                                        {{ request()->property_status == $property_type->id ? 'selected' : '' }}>
                                                                        {{ $property_status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <button type="submit"
                                                            class="btn btn-yellow">@lang('front.search')</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER SEARCH -->

    <!-- START SECTION PROPERTIES FOR SALE -->
    <section class="recently portfolio bg-white-1 home18">
        <div class="container">
            <div class="sec-title">
                <h2><span>@lang('front.properties') </span>@lang('front.for_sale')</h2>
                <p>@lang('front.find_your_dream_home_from_our_sale_added_properties').</p>
            </div>
            <div class="portfolio col-xl-12">
                <div class="slick-lancers">
                    @foreach ($properties_for_sale as $property)
                        <div class="agents-grid">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a
                                                    href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">@lang('front.view_property')</a><span
                                                    class="category">@lang('front.real_estate')</span>
                                            </h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}"
                                                class="homes-img">
                                                @if ($property->is_featured == 1)<div class="homes-tag button alt featured">@lang('front.featured')</div>@endif
                                                <div class="homes-tag button alt sale">@lang('front.for_sale')</div>
                                                <div class="homes-price">{{ $property->propertyType->name }}</div>
                                                <img src="{{ $property->getImagePathAttribute() }}"
                                                    alt="{{ $property->name }}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            @if ($property->video != '')
                                                <a href="{{ $property->video }}" class="btn popup-video popup-youtube"><i
                                                        class="fas fa-video"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a
                                                href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">{{ $property->name }}</a>
                                        </h3>
                                        <p class="homes-address mb-3">
                                            <a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">
                                                <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>{{ $property->bedrooms }} @lang('front.bedrooms')</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>{{ $property->bathrooms }} @lang('front.bathrooms')</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>{{ $property->plot_area }} @lang('front.sq_ft')</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                <span>{{ $property->garages }} @lang('front.garages')</span>
                                            </li>
                                        </ul>
                                        <!-- Price -->
                                        <div class="price-properties">
                                            <h3 class="title mt-3">
                                                <a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">$
                                                    {{ $property->price }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-all">
            <a href="{{ route('front.properties.index') }}" class="btn btn-outline-light">@lang('front.view_all')</a>
        </div>
    </section>
    <!-- END SECTION PROPERTIES FOR SALE -->

    <!-- START SECTION PROPERTIES FOR RENT -->
    <section class="recently portfolio home18">
        <div class="container">
            <div class="sec-title">
                <h2><span>@lang('front.properties') </span>@lang('front.for_rent')</h2>
                <p>@lang('front.find_your_dream_home_from_our_rent_added_properties').</p>
            </div>
            <div class="portfolio col-xl-12">
                <div class="slick-lancers">
                    @foreach ($properties_for_rent as $property)
                        <div class="agents-grid">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a
                                                    href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">@lang('front.view_property')</a><span
                                                    class="category">@lang('front.real_estate')</span>
                                            </h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}"
                                                class="homes-img">
                                                @if ($property->is_featured == 1)<div class="homes-tag button alt featured">@lang('front.featured')</div>@endif
                                                <div class="homes-tag button alt sale">@lang('front.for_rent')</div>
                                                <div class="homes-price">{{ $property->propertyType->name }}</div>
                                                <img src="{{ $property->getImagePathAttribute() }}"
                                                    alt="{{ $property->name }}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            @if ($property->video != '')
                                                <a href="{{ $property->video }}" class="btn popup-video popup-youtube"><i
                                                        class="fas fa-video"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">{{ $property->name }}</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">
                                                <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>{{ $property -> bedrooms }} @lang('front.bedrooms')</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath" aria-hidden="true"></i>
                                                <span>{{ $property -> bathrooms }} @lang('front.bathrooms')</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                <span>{{ $property -> plot_area }} @lang('sq_ft')</span>
                                            </li>
                                            <li>
                                                <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                <span>{{ $property -> garages }} @lang('front.garages')</span>
                                            </li>
                                        </ul>
                                        <!-- Price -->
                                        <div class="price-properties">
                                            <h3 class="title mt-3">
                                                <a href="{{ route('front.properties.show', ['slug' => $property->meta_slug]) }}">$ {{ $property->price }}</a>
                                            </h3>
                                        </div>
                                        <div class="footer">
                                            <a href="{{ route('front.agencies.show' , $property -> agency -> id) }}">
                                                <i class="fa fa-building"></i> {{ $property -> agency -> name }}
                                            </a>
                                            <span>
                                                <i class="fa fa-calendar"></i> {{ $property -> postedAt() }} Days ago
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-all">
            <a href="{{ route('front.properties.index') }}" class="btn btn-outline-light">@lang('view_all')</a>
        </div>
    </section>

    <!-- END SECTION PROPERTIES FOR RENT -->

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white-1 home18">
        <div class="container">
            <div class="sec-title">
                <h2><span>Why </span>Choose Us</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row service-1">
                @foreach ($whychooseus as $item)
                    <article class="col-lg-4 col-md-6 col-xs-12 serv">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="{{ asset($item->getImagePathAttribute()) }}" alt="{{ $item->title }}">
                                <h3>{{ $item->title }}</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">{{ $item->description }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END SECTION WHY CHOOSE US -->

    <!-- START SECTION TOP LOCATIONS -->
    <section class="visited-cities bg-white-2 home18">
        <div class="container">
            <div class="sec-title">
                <h2><span>@lang('front.most_popular') </span>@lang('front.places')</h2>
                <p>@lang('front.we_provide_full_service_at_every_step').</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
                @foreach ($cities as $city)
                    <div class="col-lg-6 col-md-6 pr-1">
                        <!-- Image Box -->
                        <a href="{{ route('front.city.show', $city->id) }}" class="img-box hover-effect">
                            <img src="{{ asset($city->getImagePathAttribute()) }}" class="img-responsive" alt="">
                            <!-- Badge -->
                            <div class="img-box-content visible">
                                <h4 class="mb-2">{{ $city->name }}</h4>
                                <span>{{ count($city->properties) }} @lang('front.properties')</span>
                                <ul class="starts text-center mt-2">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-lg-3 col-md-6 pr-1">
                    <!-- Image Box -->
                    <a href="listing-details.html" class="img-box hover-effect">
                        <img src="{{ asset('public/front/') }}/images/popular-places/8.jpg" class="img-responsive"
                            alt="">
                        <div class="img-box-content visible">
                            <h4 class="mb-2">Los Angeles</h4>
                            <span>307 Properties</span>
                            <ul class="starts text-center mt-2">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star-half"></i>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 pr">
                    <!-- Image Box -->
                    <a href="listing-details.html" class="img-box hover-effect">
                        <img src="{{ asset('public/front/') }}/images/popular-places/9.jpg" class="img-responsive"
                            alt="">
                        <div class="img-box-content visible">
                            <h4 class="mb-2">Miami </h4>
                            <span>409 Properties</span>
                            <ul class="starts text-center mt-2">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 pr-1">
                    <!-- Image Box -->
                    <a href="listing-details.html" class="img-box no-mb mi x3 hover-effect">
                        <img src="{{ asset('public/front/') }}/images/popular-places/10.jpg" class="img-responsive"
                            alt="">
                        <div class="img-box-content visible">
                            <h4 class="mb-2">Chicago</h4>
                            <span>507 Properties</span>
                            <ul class="starts text-center mt-2">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star-half"></i>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 pr-1">
                    <!-- Image Box -->
                    <a href="listing-details.html" class="img-box no-mb mi x3 hover-effect">
                        <img src="{{ asset('public/front/') }}/images/popular-places/11.jpg" class="img-responsive"
                            alt="">
                        <div class="img-box-content visible">
                            <h4 class="mb-2">San Francisco</h4>
                            <span>99 Properties</span>
                            <ul class="starts text-center mt-2">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 pr">
                    <!-- Image Box -->
                    <a href="listing-details.html" class="img-box san no-mb x3 hover-effect">
                        <img src="{{ asset('public/front/') }}/images/popular-places/5.jpg" class="img-responsive"
                            alt="">
                        <div class="img-box-content visible">
                            <h4 class="mb-2">Detroit </h4>
                            <span>308 Properties</span>
                            <ul class="starts text-center mt-2">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star-half"></i>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION TOP LOCATIONS -->

    <!-- START SECTION TESTIMONIALS -->
    <section class="h18 testimonials">
        <div class="container">
            <div class="sec-title">
                <h2><span>People</span> Says</h2>
                {{-- <p>There are many variations of lorem of Lorem Ipsum available for use a sit amet, consectetur
                    debits adipisicing lacus.</p> --}}
            </div>
            <div class="owl-carousel style1">
                @foreach ($people_says as $people_say)
                    <div class="single-testimonial">
                        <div class="client-comment">
                            <p>{{ $people_say->say }}</p>
                        </div>
                        <div class="clinet-inner">
                            <div class="client-thumb">
                                <img src="{{ asset($people_say->getImagePathAttribute()) }}"
                                    alt="{{ $people_say->name }}" />
                            </div>
                            <div class="client-info">
                                <h2>{{ $people_say->name }}</h2>
                                <span>{{ $people_say->job }}</span>
                                <div class="client-reviews">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END SECTION TESTIMONIALS -->

    <!-- START SECTION BLOG -->
    <section class="blog-section bg-white-2 home18">
        <div class="container">
            <div class="sec-title">
                <h2><span>Tips & </span>Articles</h2>
                <p>Grow your appraisal and real estate career with tips.</p>
            </div>
            <div class="news-wrap">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-md-6 col-xs-12">
                            <div class="news-item">
                                <a href="{{ route('front.blogs.show', $blog->meta_slug) }}" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="img-responsive" src="{{ asset($blog->getImagePathAttribute()) }}"
                                            alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="{{ route('front.blogs.show', $blog->meta_slug) }}">
                                        <h3>{{ $blog->title }}</h3>
                                    </a>
                                    <div class="dates">
                                        <span class="date">{{ $blog->created_at->format('M d, Y') }}
                                            &nbsp;</span>
                                        {{-- <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span>
                                        </li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span>
                                        </li>
                                    </ul> --}}
                                    </div>
                                    <div class="news-item-descr big-news">
                                        <p>{{ $blog->description }}</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="{{ route('front.blogs.show', $blog->meta_slug) }}"
                                            class="news-link">Read more...</a>
                                        <div class="admin">
                                            <p>{{ $blog->creator }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item">
                            <a href="blog-details.html" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="{{ asset('public/front/') }}/images/blog/b-2.jpg" alt="blog image">
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="blog-details.html">
                                    <h3>Find Good Places</h3>
                                </a>
                                <div class="dates">
                                    <span class="date">May 20, 2020 &nbsp;/</span>
                                    <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span>
                                        </li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="news-item-descr big-news">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua ipsum dolor sit amet,
                                        consectetur.</p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="blog-details.html" class="news-link">Read more...</a>
                                    <div class="admin">
                                        <p>By, Lis Jhonson</p>
                                        <img src="{{ asset('public/front/') }}/images/testimonials/ts-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BLOG -->

    <!-- STAR SECTION PARTNERS -->
    <div class="partners bg-white-1">
        <div class="container">
            <div class="owl-carousel style2">
                @forelse ($partners as $partner)
                    <div class="owl-item"><img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}">
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <!-- END SECTION PARTNERS -->

    <!-- START PRELOADER -->

    <!-- END PRELOADER -->

@endsection


@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('public/front/') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('public/front/') }}/js/moment.js"></script>
    <script src="{{ asset('public/front/') }}/js/transition.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/slick.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/slick3.js"></script>
    <script src="{{ asset('public/front/') }}/js/fitvids.js"></script>
    <script src="{{ asset('public/front/') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/lightcase.js"></script>
    <script src="{{ asset('public/front/') }}/js/owl.carousel.js"></script>
    <script src="{{ asset('public/front/') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/jquery.form.js"></script>
    <script src="{{ asset('public/front/') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/forms-2.js"></script>
    <script src="{{ asset('public/front/') }}/js/leaflet.js"></script>
    <script src="{{ asset('public/front/') }}/js/leaflet-gesture-handling.min.js"></script>
    <script src="{{ asset('public/front/') }}/js/leaflet-providers.js"></script>
    <script src="{{ asset('public/front/') }}/js/leaflet.markercluster.js"></script>
    <script src="{{ asset('public/front/') }}/js/map4.js"></script>

    <!-- Slider Revolution scripts -->
    <script src="{{ asset('public/front/') }}/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="{{ asset('public/front/') }}/revolution/js/extensions/revolution.extension.video.min.js"></script>

    <!-- MAIN JS -->
    <script src="{{ asset('public/front/') }}/js/script.js"></script>
@stop
