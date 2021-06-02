@extends('layouts.front.app')

@section('style')
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/leaflet.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/leaflet.markercluster.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/timedropper.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/datedropper.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/lightcase.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/styles.css">
    <link rel="stylesheet" id="color" href="{{ asset('public/front') }}/css/default.css"

@stop

@section('content')


    <!-- START SECTION PROPERTIES LISTING -->
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="headings-2 pt-0">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h1>{{ $property -> name }} <span class="category-tag">{{ $property -> getRentSale() }}</span></h1>
                                            <div class="mt-0">
                                                <a href="#" class="listing-address">
                                                    <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{ $property -> address }} - {{ $property -> city -> name}}, {{ $property -> country -> name}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single detail-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h4>&{{ $property -> currency -> symbol }} {{ $property -> price }}</h4>
                                                <div class="mt-0">
                                                    <a href="#" class="listing-address">
                                                        <p>{{ $property -> plot_area }} m / sq</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- main slider carousel items -->
{{--                            @if($property -> gallery)--}}
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="carousel-inner">

                                        @foreach (json_decode( $property -> gallery, true) as $index => $item)
                                            <div class="{{ $index == 0 ? 'active' : '' }} item carousel-item" data-slide-number="{{ $index }}">
                                                <img src="{{ asset('uploads/properties/gallery/' . $item ) }}" class="img-fluid m-auto" alt="{{ $property -> name . $item }}">
                                            </div>
                                        @endforeach

                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                    </div>
                                    <!-- main slider carousel nav controls -->
                                    <ul class="carousel-indicators smail-listing list-inline nav nav-justified">
                                        @foreach (json_decode( $property -> gallery, true) as $index => $item)
                                            <li class="list-inline-item {{ $index == 0 ? 'active' : '' }}">
                                                <a id="carousel-selector-{{ $index }}" class="selected" data-slide-to="{{ $index }}" data-target="#listingDetailsSlider">
                                                    <img src="{{ asset('uploads/properties/gallery/' . $item ) }}" class="img-fluid" alt="{{ $property -> name . $item }}">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- main slider carousel items -->
                                </div>
{{--                            @endif--}}
                            <div class="blog-info details mb-30">
                                <h5 class="mb-1">Description</h5>
                                {!! html_entity_decode( $property -> description ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="single homes-content details mb-30">
                        <!-- title -->
                        <h5 class="mb-4">Property Details</h5>
                        <ul class="homes-list clearfix row">
                            <li class="col-4 m-0 p-0">
                                <span class="font-weight-bold mr-1">Property ID:</span>
                                <span class="det">{{ $property -> id . $property -> plot_area . $property -> construction_area }}</span>
                            </li>

                            <li class="col-4 m-0 p-0">
                                <span class="font-weight-bold mr-1">Property Price:</span>
                                <span class="det">&{{ $property -> currency -> symbol }} {{ $property -> price }}</span>
                            </li>
                            <li class="col-4 m-0 p-0">
                                <span class="font-weight-bold mr-1">Rooms:</span>
                                <span class="det">{{ $property -> rooms }}</span>
                            </li>
                            <li class="col-4 m-0 p-0">
                                <span class="font-weight-bold mr-1">Bedrooms:</span>
                                <span class="det">{{ $property -> bedrooms }}</span>
                            </li>
                            <li class="col-4 m-0 p-0">
                                <span class="font-weight-bold mr-1">Bath:</span>
                                <span class="det">{{ $property -> bathrooms }}</span>
                            </li>
                            <li class="col-4 m-0 p-0">
                                <span class="font-weight-bold mr-1">Garages:</span>
                                <span class="det">{{ $property -> garages }}</span>
                            </li>
                            <li class="col-6 m-0 p-0">
                                <span class="font-weight-bold mr-1">Property Type:</span>
                                <span class="det">{{ $property -> propertyType -> name }}</span>
                            </li>
                            <li class="col-6 m-0 p-0">
                                <span class="font-weight-bold mr-1">Property status:</span>
                                <span class="det">{{ $property -> propertyStatus -> name }}</span>
                            </li>
                        </ul>
                        <!-- title -->
                        <h5 class="mt-5">Amenities</h5><span class="text-sm text-muted">still not dynamic</span>
                        <!-- cars List -->
                        <ul class="homes-list clearfix">
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Air Cond</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Balcony</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Internet</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Dishwasher</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Bedding</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Cable TV</span>
                            </li>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Parking</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Pool</span>
                            </li>
                            <li>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span>Fridge</span>
                            </li>
                        </ul>
                    </div>
{{--                    @if($property -> floor_plan !== 'default.png')--}}
                    <div class="floor-plan property wprt-image-video w50 pro">
                        <h5>Floor Plans</h5>
                        <img alt="image" src="{{ $property -> floor_plan_path }}">
                    </div>
{{--                    @endif--}}
{{--                    @if($property -> video !== null)--}}
                    <div class="property wprt-image-video w50 pro">
                        <h5>Property Video</h5>
                        <img alt="image" src="{{ asset('public/front') }}/images/slider/home-slider-4.jpg">
                        <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=14semTlwyUY">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
{{--                    @endif--}}
{{--                   @if($property -> latitude && $property -> longitude)--}}
                    <div class="property-location map">
                        <h5>Location</h5>
                        <div class="divider-fade"></div>
                        <div id="map-contact" class="property-map"></div>
                    </div>
{{--                   @endif--}}

                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        <!-- end author-verified-badge -->
                        <div class="sidebar">
                            <div class="widget-boxed">
                                <div class="widget-boxed-header">
                                    <h4>Agency Information</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="sidebar-widget author-widget2">
                                        <div class="author-box clearfix">
                                            <img src="{{ $property -> agency -> image_path }}" alt="author-image" class="author__img">
                                            <h4 class="author__title">{{ $property -> agency -> name }}</h4>
                                        </div>
                                        <ul class="author__contact">
                                            <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>{{ $property -> agency -> address }}, {{ $property -> agency -> city -> name }}, {{ $property -> agency -> country -> name }}</li>
                                            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#">0{{ $property -> agency -> mobile }}</a></li>
                                            <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">{{ $property -> agency -> email }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="main-search-field-2">
                                <div class="widget-boxed mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Recent Properties</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="recent-post">
                                            <div class="recent-main">
                                                <div class="recent-img">
                                                    <a href="blog-details.html"><img src="{{ asset('public/front') }}/images/feature-properties/fp-1.jpg" alt=""></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                                    <p>$230,000</p>
                                                </div>
                                            </div>
                                            <div class="recent-main my-4">
                                                <div class="recent-img">
                                                    <a href="blog-details.html"><img src="{{ asset('public/front') }}/images/feature-properties/fp-2.jpg" alt=""></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                                    <p>$230,000</p>
                                                </div>
                                            </div>
                                            <div class="recent-main">
                                                <div class="recent-img">
                                                    <a href="blog-details.html"><img src="{{ asset('public/front') }}/images/feature-properties/fp-3.jpg" alt=""></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="blog-details.html"><h6>Family Home</h6></a>
                                                    <p>$230,000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-boxed mt-5">
                                    <div class="widget-boxed-header mb-5">
                                        <h4>Feature Properties</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="slick-lancers">
                                            <div class="agents-grid mr-0">
                                                <div class="listing-item compact">
                                                    <a href="properties-details.html" class="listing-img-container">
                                                        <div class="listing-badges">
                                                            <span class="featured">$ 230,000</span>
                                                            <span>For Sale</span>
                                                        </div>
                                                        <div class="listing-img-content">
                                                            <span class="listing-compact-title">House Luxury <i>New York</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('public/front') }}/images/feature-properties/fp-1.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="agents-grid mr-0">
                                                <div class="listing-item compact">
                                                    <a href="properties-details.html" class="listing-img-container">
                                                        <div class="listing-badges">
                                                            <span class="featured">$ 6,500</span>
                                                            <span class="rent">For Rent</span>
                                                        </div>
                                                        <div class="listing-img-content">
                                                            <span class="listing-compact-title">House Luxury <i>Los Angles</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('public/front') }}/images/feature-properties/fp-2.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="agents-grid mr-0">
                                                <div class="listing-item compact">
                                                    <a href="properties-details.html" class="listing-img-container">
                                                        <div class="listing-badges">
                                                            <span class="featured">$ 230,000</span>
                                                            <span>For Sale</span>
                                                        </div>
                                                        <div class="listing-img-content">
                                                            <span class="listing-compact-title">House Luxury <i>San Francisco</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('public/front') }}/images/feature-properties/fp-3.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="agents-grid mr-0">
                                                <div class="listing-item compact">
                                                    <a href="properties-details.html" class="listing-img-container">
                                                        <div class="listing-badges">
                                                            <span class="featured">$ 6,500</span>
                                                            <span class="rent">For Rent</span>
                                                        </div>
                                                        <div class="listing-img-content">
                                                            <span class="listing-compact-title">House Luxury <i>Miami FL</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('public/front') }}/images/feature-properties/fp-4.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="agents-grid mr-0">
                                                <div class="listing-item compact">
                                                    <a href="properties-details.html" class="listing-img-container">
                                                        <div class="listing-badges">
                                                            <span class="featured">$ 230,000</span>
                                                            <span>For Sale</span>
                                                        </div>
                                                        <div class="listing-img-content">
                                                            <span class="listing-compact-title">House Luxury <i>Chicago IL</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('public/front') }}/images/feature-properties/fp-5.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="agents-grid mr-0">
                                                <div class="listing-item compact">
                                                    <a href="properties-details.html" class="listing-img-container">
                                                        <div class="listing-badges">
                                                            <span class="featured">$ 6,500</span>
                                                            <span class="rent">For Rent</span>
                                                        </div>
                                                        <div class="listing-img-content">
                                                            <span class="listing-compact-title">House Luxury <i>Toronto CA</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('public/front') }}/images/feature-properties/fp-6.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->

@endsection

@section('script')
    <!-- ARCHIVES JS -->
    <!-- ARCHIVES JS -->
    <script src="{{ asset('public/front') }}/js/jquery.min.js"></script>
    <script src="{{ asset('public/front') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('public/front') }}/js/range-slider.js"></script>
    <script src="{{ asset('public/front') }}/js/tether.min.js"></script>
    <script src="{{ asset('public/front') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/front') }}/js/mmenu.min.js"></script>
    <script src="{{ asset('public/front') }}/js/mmenu.js"></script>
    <script src="{{ asset('public/front') }}/js/slick.min.js"></script>
    <script src="{{ asset('public/front') }}/js/slick4.js"></script>
    <script src="{{ asset('public/front') }}/js/fitvids.js"></script>
    <script src="{{ asset('public/front') }}/js/smooth-scroll.min.js"></script>
    <script src="{{ asset('public/front') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('public/front') }}/js/popup.js"></script>
    <script src="{{ asset('public/front') }}/js/ajaxchimp.min.js"></script>
    <script src="{{ asset('public/front') }}/js/newsletter.js"></script>
    <script src="{{ asset('public/front') }}/js/timedropper.js"></script>
    <script src="{{ asset('public/front') }}/js/datedropper.js"></script>
    <script src="{{ asset('public/front') }}/js/leaflet.js"></script>
    <script src="{{ asset('public/front') }}/js/leaflet-gesture-handling.min.js"></script>
    <script src="{{ asset('public/front') }}/js/leaflet-providers.js"></script>
    <script src="{{ asset('public/front') }}/js/leaflet.markercluster.js"></script>
    <script src="{{ asset('public/front') }}/js/color-switcher.js"></script>
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

    <script>
        $(document).ready(function() {
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });

    </script>

    <script>
        $('.slick-carousel').each(function() {
            var slider = $(this);
            $(this).slick({
                infinite: true,
                dots: false,
                arrows: false,
                centerMode: true,
                centerPadding: '0'
            });

            $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                slider.slick('slickPrev');
            });
            $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                slider.slick('slickNext');
            });
        });

        var latitude = {{ $property -> latitude }}
        var longitude = {{ $property -> longitude }}

        if ($('#map-contact').length) {
            var map = L.map('map-contact', {
                zoom: 14,
                maxZoom: 20,
                tap: false,
                gestureHandling: true,
                center: [ latitude , longitude ]
            });

            map.scrollWheelZoom.disable();

            var Hydda_Full = L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
                scrollWheelZoom: false,
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var icon = L.divIcon({
                html: '<i class="fa fa-building"></i>',
                iconSize: [50, 50],
                iconAnchor: [50, 50],
                popupAnchor: [-20, -42]
            });

            var marker = L.marker([ latitude , longitude ], {
                icon: icon
            }).addTo(map);
        }
    </script>

@stop
