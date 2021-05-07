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
    <link rel="stylesheet" href="{{ asset('front') }}/css/leaflet.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/leaflet.markercluster.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/leaflet.markercluster.default.css">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="{{ asset('front') }}/revolution//css/settings.css">
    <link rel="stylesheet" href="{{ asset('front') }}/revolution//css/layers.css">
    <link rel="stylesheet" href="{{ asset('front') }}/revolution//css/navigation.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('front') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/owl.carousel.min.css">//
    <link rel="stylesheet" href="{{ asset('front') }}/css/slick.css">
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
                                <h1 class="title text-center">@lang('front.index.Find Your Dream Home')</h1>
                                <h5 class="sub-title text-center">@lang('front.index.We Have Over Million Properties For You')</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="banner-search-wrap">
                                <ul class="nav nav-tabs rld-banner-tab">
                                    <li class="nav-item">
                                        <a class="nav-link  active" data-toggle="tab" href="#for_sale">@lang('front.For Sale')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#for_rent">@lang('front.For Rent')</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="for_sale">
                                        <form action="{{ route('front.properties.index', ['rent_sale' => 0 ]) }}" method="GET">
                                            <div class="rld-main-search">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select left-icon">
                                                            <select name="agency_id" class="select single-select">
                                                                <option value="">@lang('front.index.Agency')</option>
                                                                @foreach($agencies as $agency)
                                                                    <option value="{{ $agency -> id }}" {{ request()->agency_id == $agency-> id ? 'selected' : '' }}>{{ $agency -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select">
                                                            <select name="property_type" class="select single-select">
                                                                <option value="">@lang('front.property_type')</option>
                                                                @foreach($property_types as $property_type)
                                                                    <option value="{{ $property_type -> id }}" {{ request()->property_type == $property_type-> id ? 'selected' : '' }}>{{ $property_type -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <div class="rld-single-select">
                                                            <select name="property_status" class="select single-select">
                                                                <option value="">@lang('front.property_status')</option>
                                                                @foreach($property_statuses as $property_status)
                                                                    <option value="{{ $property_status -> id }}" {{ request()->property_status == $property_type-> id ? 'selected' : '' }}>{{ $property_status -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <button type="submit" class="btn btn-yellow">@lang('front.search')</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="for_rent">
                                        <form action="{{ route('front.properties.index', ['rent_sale' => 1 ]) }}" method="GET">
                                            <div class="rld-main-search">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select left-icon">
                                                            <select name="agency_id" class="select single-select">
                                                                <option value="">@lang('front.index.Agency')</option>
                                                                @foreach($agencies as $agency)
                                                                    <option value="{{ $agency -> id }}" {{ request()->agency_id == $agency-> id ? 'selected' : '' }}>{{ $agency -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="rld-single-select">
                                                            <select name="property_type" class="select single-select">
                                                                <option value="">@lang('front.property_type')</option>
                                                                @foreach($property_types as $property_type)
                                                                    <option value="{{ $property_type -> id }}" {{ request()->property_type == $property_type-> id ? 'selected' : '' }}>{{ $property_type -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <div class="rld-single-select">
                                                            <select name="property_status" class="select single-select">
                                                                <option value="">@lang('front.property_status')</option>
                                                                @foreach($property_statuses as $property_status)
                                                                    <option value="{{ $property_status -> id }}" {{ request()->property_status == $property_type-> id ? 'selected' : '' }}>{{ $property_status -> name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                                        <button type="submit" class="btn btn-yellow">@lang('front.search')</button>
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
        @foreach($properties as $property)
            <div class="container">
                <div class="sec-title">
                    <h2><span>@lang('front.properties') </span>@lang('front.For Sale')</h2>
                    <p>Find your dream home from our Sale added properties.</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        @if($property -> add_to_home == 1 && $property ->  rent_sale == 0 )
                            <div class="agents-grid">
                                <div class="landscapes">
                                    <div class="project-single">
                                        <div class="project-inner project-head">
                                            <div class="project-bottom">
                                                <h4><a href="{{ route('front.properties.show', $property -> id) }}">View Property</a><span class="category">{{ $property -> name }}</span>
                                                </h4>
                                            </div>
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="#" class="homes-img">
                                                    @if( $property -> is_featured == 1 )
                                                        <div class="homes-tag button alt featured">Featured</div>
                                                    @endif
                                                    <div class="homes-tag button alt sale">For Sale</div>
    {{--                                                    <div class="homes-price">Family Home</div>--}}
                                                    <img src="{{ $property -> image_path }}" alt="{{ $property -> name }}" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                <a href="{{ route('front.properties.show' , $property -> id) }}" class="btn"><i class="fa fa-link"></i></a>
                                                <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4"
                                                   class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                                <a href="{{ route('front.properties.show' , $property -> id) }}" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                            </div>
                                        </div>
                                        <!-- homes content -->
                                        <div class="homes-content">
                                            <!-- homes address -->
                                            <h3><a href="{{ route('front.properties.show', $property -> id ) }}">{{ $property -> name }}</a></h3>
                                            <p class="homes-address mb-3">
                                                <a href="{{ route('front.properties.show' , $property -> id) }}">
                                                    <i class="fa fa-map-marker"></i><span>{{ $property -> address }} - {{ $property -> city -> name}}, {{ $property -> country -> name}}</span>
                                                </a>
                                            </p>
                                            <!-- homes List -->
                                            <ul class="homes-list clearfix">
                                                <li>
                                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                                    <span>{{ $property -> bedrooms }} Bedrooms</span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                                    <span>{{ $property -> bathrooms }} Bathrooms</span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                                    <span>{{ $property -> plot_area }} m sq</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                    <span>{{ $property -> garages }} Garages</span>
                                                </li>
                                            </ul>
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-3">
                                                    <a href="{{ route('front.properties.show' , $property -> id) }}">$ {{ $property -> price }}</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <a href="{{ route('front.agencies.show' , $property -> agency -> id) }}">
                                                    <i class="fa fa-user"></i> {{ $property -> agency -> name }}
                                                </a>
                                                <span>
                                                <i class="fa fa-calendar"></i> {{ $property -> postedAt() }} Days ago
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-all">
                <a href="{{ route('front.properties.index' , ['rent_sale' => 0]) }}" class="btn btn-outline-light">View All</a>
            </div>
        @endforeach
    </section>
    <!-- END SECTION PROPERTIES FOR SALE -->

    <!-- START SECTION PROPERTIES FOR RENT -->
    <section class="recently portfolio home18">
        @foreach($properties as $property)
            <div class="container">
                <div class="sec-title">
                    <h2><span>Properties </span>For Rent</h2>
                    <p>Find your dream home from our Rent added properties.</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        @if($property -> add_to_home == 1 && $property ->  rent_sale == 1 )
                            <div class="agents-grid">
                                <div class="landscapes">
                                    <div class="project-single">
                                        <div class="project-inner project-head">
                                            <div class="project-bottom">
                                                <h4><a href="{{ route('front.properties.show', $property -> id) }}">View Property</a><span class="category">{{ $property -> name }}</span>
                                                </h4>
                                            </div>
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="#" class="homes-img">
                                                    @if( $property -> is_featured == 1 )
                                                        <div class="homes-tag button alt featured">Featured</div>
                                                    @endif
                                                        <div class="homes-tag button sale rent">For Rent</div>
                                                    {{--                                                    <div class="homes-price">Family Home</div>--}}
                                                    <img src="{{ $property -> image_path }}" alt="{{ $property -> name }}" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                <a href="{{ route('front.properties.show' , $property -> id) }}" class="btn"><i class="fa fa-link"></i></a>
                                                <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4"
                                                   class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                                <a href="{{ route('front.properties.show' , $property -> id) }}" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                            </div>
                                        </div>
                                        <!-- homes content -->
                                        <div class="homes-content">
                                            <!-- homes address -->
                                            <h3><a href="{{ route('front.properties.show', $property -> id ) }}">{{ $property -> name }}</a></h3>
                                            <p class="homes-address mb-3">
                                                <a href="{{ route('front.properties.show' , $property -> id) }}">
                                                    <i class="fa fa-map-marker"></i><span>{{ $property -> address }} - {{ $property -> city -> name}}, {{ $property -> country -> name}}</span>
                                                </a>
                                            </p>
                                            <!-- homes List -->
                                            <ul class="homes-list clearfix">
                                                <li>
                                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                                    <span>{{ $property -> bedrooms }} Bedrooms</span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                                    <span>{{ $property -> bathrooms }} Bathrooms</span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                                    <span>{{ $property -> plot_area }} m sq</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                    <span>{{ $property -> garages }} Garages</span>
                                                </li>
                                            </ul>
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-3">
                                                    <a href="{{ route('front.properties.show' , $property -> id) }}">$ {{ $property -> price }}</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <a href="{{ route('front.agencies.show' , $property -> agency -> id) }}">
                                                    <i class="fa fa-user"></i> {{ $property -> agency -> name }}
                                                </a>
                                                <span>
                                                <i class="fa fa-calendar"></i> {{ $property -> postedAt() }} Days ago
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-all">
                <a href="{{ route('front.properties.index' , ['rent_sale' => 1]) }}" class="btn btn-outline-light">View All</a>
            </div>
        @endforeach
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
                @foreach($whychooseus as $item)
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
                <h2><span>Most Popular </span>Places</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-lg-6 col-md-6 pr-1">
                    <!-- Image Box -->
                    <a href="listing-details.html" class="img-box hover-effect">
                        <img src="{{ asset('front') }}/images/popular-places/7.jpg" class="img-responsive" alt="">
                        <!-- Badge -->
                        <div class="img-box-content visible">
                            <h4 class="mb-2">New York</h4>
                            <span>203 Properties</span>
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
                    <a href="listing-details.html" class="img-box hover-effect">
                        <img src="{{ asset('front') }}/images/popular-places/8.jpg" class="img-responsive" alt="">
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
                        <img src="{{ asset('front') }}/images/popular-places/9.jpg" class="img-responsive" alt="">
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
                        <img src="{{ asset('front') }}/images/popular-places/10.jpg" class="img-responsive" alt="">
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
                        <img src="{{ asset('front') }}/images/popular-places/11.jpg" class="img-responsive" alt="">
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
                        <img src="{{ asset('front') }}/images/popular-places/5.jpg" class="img-responsive" alt="">
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
                <p>There are many variations of lorem of Lorem Ipsum available for use a sit amet, consectetur
                    debits adipisicing lacus.</p>
            </div>
            <div class="owl-carousel style1">
                <div class="single-testimonial">
                    <div class="client-comment">
                        <p>Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim
                            varius enim, tellus tincidunt tellus est sed</p>
                    </div>
                    <div class="clinet-inner">
                        <div class="client-thumb">
                            <img src="{{ asset('front') }}/images/testimonials/ts-1.jpg" alt="" />
                        </div>
                        <div class="client-info">
                            <h2>Lisa Smith</h2>
                            <span>New York City</span>
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
                <div class="single-testimonial">
                    <div class="client-comment">
                        <p>Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim
                            varius enim, tellus tincidunt tellus est sed</p>
                    </div>
                    <div class="clinet-inner">
                        <div class="client-thumb">
                            <img src="{{ asset('front') }}/images/testimonials/ts-2.jpg" alt="" />
                        </div>
                        <div class="client-info">
                            <h2>Jhon Morris</h2>
                            <span>Los Angeles</span>
                            <div class="client-reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-empty"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonial">
                    <div class="client-comment">
                        <p>Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim
                            varius enim, tellus tincidunt tellus est sed</p>
                    </div>
                    <div class="clinet-inner">
                        <div class="client-thumb">
                            <img src="{{ asset('front') }}/images/testimonials/ts-3.jpg" alt="" />
                        </div>
                        <div class="client-info">
                            <h2>Mary Deshaw</h2>
                            <span>Chicago</span>
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
                <div class="single-testimonial">
                    <div class="client-comment">
                        <p>Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim
                            varius enim, tellus tincidunt tellus est sed</p>
                    </div>
                    <div class="clinet-inner">
                        <div class="client-thumb">
                            <img src="{{ asset('front') }}/images/testimonials/ts-4.jpg" alt="" />
                        </div>
                        <div class="client-info">
                            <h2>Gary Steven</h2>
                            <span>Philadelphia</span>
                            <div class="client-reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-empty"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonial">
                    <div class="client-comment">
                        <p>Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim
                            varius enim, tellus tincidunt tellus est sed</p>
                    </div>
                    <div class="clinet-inner">
                        <div class="client-thumb">
                            <img src="{{ asset('front') }}/images/testimonials/ts-5.jpg" alt="" />
                        </div>
                        <div class="client-info">
                            <h2>Cristy Mayer</h2>
                            <span>San Francisco</span>
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
                <div class="single-testimonial">
                    <div class="client-comment">
                        <p>Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim
                            varius enim, tellus tincidunt tellus est sed</p>
                    </div>
                    <div class="clinet-inner">
                        <div class="client-thumb">
                            <img src="{{ asset('front') }}/images/testimonials/ts-6.jpg" alt="" />
                        </div>
                        <div class="client-info">
                            <h2>Ichiro Tasaka</h2>
                            <span>Houston</span>
                            <div class="client-reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-empty"></i>
                            </div>
                        </div>
                    </div>
                </div>
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
                    @foreach($blogs as $blog)
                    <div class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item">
                            <a href="{{ route('front.blogs.show', $blog->meta_slug) }}" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="{{ asset($blog->getImagePathAttribute()) }}" alt="blog image">
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="{{ route('front.blogs.show', $blog->meta_slug) }}">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                <div class="dates">
                                    <span class="date">{{ $blog->created_at }} &nbsp;</span>
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
                                    <a href="{{ route('front.blogs.show', $blog->meta_slug) }}" class="news-link">Read more...</a>
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
                                    <img class="img-responsive" src="{{ asset('front') }}/images/blog/b-2.jpg" alt="blog image">
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
                                        <img src="{{ asset('front') }}/images/testimonials/ts-5.jpg" alt="">
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
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/11.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/12.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/13.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/14.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/15.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/16.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/17.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/11.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/12.jpg" alt=""></div>
                <div class="owl-item"><img src="{{ asset('front') }}/images/partners/13.jpg" alt=""></div>
            </div>
        </div>
    </div>
    <!-- END SECTION PARTNERS -->

    <!-- START PRELOADER -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- END PRELOADER -->

@endsection


@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('front') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('front') }}/js/moment.js"></script>
    <script src="{{ asset('front') }}/js/transition.min.js"></script>
    <script src="{{ asset('front') }}/js/slick.min.js"></script>
    <script src="{{ asset('front') }}/js/slick3.js"></script>
    <script src="{{ asset('front') }}/js/fitvids.js"></script>
    <script src="{{ asset('front') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('front') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('front') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('front') }}/js/lightcase.js"></script>
    <script src="{{ asset('front') }}/js/owl.carousel.js"></script>
    <script src="{{ asset('front') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.form.js"></script>
    <script src="{{ asset('front') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('front') }}/js/forms-2.js"></script>
    <script src="{{ asset('front') }}/js/leaflet.js"></script>
    <script src="{{ asset('front') }}/js/leaflet-gesture-handling.min.js"></script>
    <script src="{{ asset('front') }}/js/leaflet-providers.js"></script>
    <script src="{{ asset('front') }}/js/leaflet.markercluster.js"></script>
    <script src="{{ asset('front') }}/js/map4.js"></script>

    <!-- Slider Revolution scripts -->
    <script src="{{ asset('front') }}/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="{{ asset('front') }}/revolution/js/extensions/revolution.extension.video.min.js"></script>

    <!-- MAIN JS -->
    <script src="{{ asset('front') }}/js/script.js"></script>
@stop
