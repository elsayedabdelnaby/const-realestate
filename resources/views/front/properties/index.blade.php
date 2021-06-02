@extends('layouts.front.app')

@section('style')
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/lightcase.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/styles.css">

@stop

@section('content')

    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Properties</h1>
                <h2><a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Properties</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-right list featured portfolio blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 blog-pots">
                    <!-- Block heading Start-->
                    <div class="block-heading">
                        <div class="row">
                            <div class="col-lg-6 col-md-5 col-2">
                                <h4>
                                <span class="heading-icon">
                                <i class="fa fa-th-list"></i>
                                </span>
                                    <span class="hidden-sm-down">Properties Listing</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Block heading end -->
                        @foreach($properties as $property)
                            <div class="row featured portfolio-items py-3">
                            @if($property -> is_active == 1)
                                <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0">
                                    <div class="project-single mb-0 bb-0">
                                        <div class="project-inner project-head">
                                            <div class="project-bottom">
                                                <h4><a href="{{ route('front.properties.show' , $property -> id) }}">View Property</a><span class="category">{{ $property -> name }}</span></h4>
                                            </div>
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="#" class="homes-img">
                                                    @if( $property -> is_featured == 1 )
                                                        <div class="homes-tag button alt featured">Featured</div>
                                                    @endif
                                                    @if( $property -> rent_sale == 0 )
                                                        <div class="homes-tag button sale">For Sale</div>
                                                    @else
                                                        <div class="homes-tag button sale rent">For Rent</div>
                                                    @endif
                                                    <img src="{{ $property -> image_path }}" alt="home-1" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                <a href="{{ route('front.properties.show' , $property -> id) }}" class="btn"><i class="fa fa-link"></i></a>
                                                <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" target="_blank" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                                <a href="#" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44">
                                    <!-- homes address -->
                                    <h3><a href="{{ route('front.properties.show' , $property -> id) }}">{{ $property -> name }}</a></h3>
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
                                            <i class="fa fa-building"></i> {{ $property -> agency -> name }}
                                        </a>
                                        <span>
                                            <i class="fa fa-calendar"></i> {{ $property -> postedAt() }} Days ago
                                        </span>
                                    </div>
                                </div>
                            @endif
                            </div>
                        @endforeach
                </div>
                <aside class="col-lg-3 col-md-12 car">
                    <div class="widget">
                        <div class="section-heading">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="media-body">
                                    <h5>Search Properties</h5>
                                    <div class="border"></div>
                                    <p>Search your Properties</p>
                                </div>
                            </div>
                        </div>
                        <!-- Search Fields -->
                        <div class="main-search-field">
                            <h5 class="title">Filter</h5>
                            <form method="GET">
                                <div class="at-col-default-mar mb-3">
                                    <select name="city_id">
                                        <option value="" selected>City</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city -> id }}" {{ request()->city_id == $city-> id ? 'selected' : '' }}>{{ $city -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="at-col-default-mar mb-3">
                                    <select name="property_status">
                                        <option value="" selected>Property Status</option>
                                        @foreach($property_statuses as $property_status)
                                            <option value="{{ $property_status -> id }}" {{ request()->property_status == $property_status-> id ? 'selected' : '' }}>{{ $property_status -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="at-col-default-mar mb-3">
                                    <div class="at-col-default-mar">
                                        <select name="property_type">
                                            <option value="" data-show=".acitveon" selected>Property Type</option>
                                            @foreach($property_types as $property_type)
                                                <option value="{{ $property_type -> id }}" {{ request()->property_type == $property_type-> id ? 'selected' : '' }}>{{ $property_type -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 no-pds">
                                    <div class="at-col-default-mar">
                                        <input class="at-input" type="text" name="min-area" placeholder="Meter Fit Min">
                                    </div>
                                </div>
                                <div class="col-lg-12 no-pds my-4">
                                    <div class="at-col-default-mar">
                                        <input class="at-input" type="text" name="max-area" placeholder="Meter Fit Max">
                                    </div>
                                </div>

                        <div class="col-lg-12 no-pds">
                            <div class="at-col-default-mar">
                                <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
                            </div>
                        </div>
                            </form>
                        </div>
                        <div class="recent-post py-5">
                            <h5 class="font-weight-bold mb-4">Recent Properties</h5>
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('public/front/') }}/images/feature-properties/fp-1.jpg" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                    <p>$230,000</p>
                                </div>
                            </div>
                            <div class="recent-main my-4">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('public/front/') }}/images/feature-properties/fp-2.jpg" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                    <p>$230,000</p>
                                </div>
                            </div>
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="blog-details.html"><img src="{{ asset('public/front/') }}/images/feature-properties/fp-3.jpg" alt=""></a>
                                </div>
                                <div class="info-img">
                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                    <p>$230,000</p>
                                </div>
                            </div>
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
                                <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                                <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            {{ $properties->appends(request()->query())->links() }}

        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->

@endsection

@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('public/front') }}/js/jquery.min.js"></script>
    <script src="{{ asset('public/front') }}/js/tether.min.js"></script>
    <script src="{{ asset('public/front') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/front') }}/js/mmenu.min.js"></script>
    <script src="{{ asset('public/front') }}/js/mmenu.js"></script>
    <script src="{{ asset('public/front') }}/js/slick.min.js"></script>
    <script src="{{ asset('public/front') }}/js/slick4.js"></script>
    <script src="{{ asset('public/front') }}/js/smooth-scroll.min.js"></script>
    <script src="{{ asset('public/front') }}/js/ajaxchimp.min.js"></script>
    <script src="{{ asset('public/front') }}/js/newsletter.js"></script>
    <script src="{{ asset('public/front') }}/js/color-switcher.js"></script>
    <script src="{{ asset('public/front') }}/js/timedropper.js"></script>
    <script src="{{ asset('public/front') }}/js/datedropper.js"></script>
    <script src="{{ asset('public/front') }}/js/inner.js"></script>

    <!-- Date Dropper Script-->
    <script>
        $('#reservation-date').dateDropper();

    </script>
    <!-- Time Dropper Script-->
    <script>
        this.$('#reservation-time').timeDropper({
            setCurrentTime: false,
            meridians: true,
            primaryColor: "#e8212a",
            borderColor: "#e8212a",
            minutesInterval: '15'
        });

    </script>
@stop
