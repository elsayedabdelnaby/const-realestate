@extends('layouts.front.app')

@section('meta_tags')

    @include('front.partials.meta', [
    'title' => $agency->meta_title,
    'keywords' => $agency->meta_keywords,
    'description' => $agency->meta_description,
    'image' => $agency->image_path,
    ])

@endsection

@section('title')
    {{ $agency->meta_title }}
@endsection

@section('header-scripts')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "{{ $agency->city->translate(App::getLocale())->name }}", {{ $agency->country->translate(App::getLocale())->name }}"
            },
            "email": "{{ $agency->email }}",
            "faxNumber": "{{ $agency->fax }}",
            "member": [{
                    "@type": "Organization"
                },
                {
                    "@type": "Organization"
                }
            ],
            "name": "{{ $agency->translate(App::getLocale())->name }}",
            "telephone": "{{ $agency->mobile }}",
            "url": "{{ Request::url() }}",
            "image": [
                "{{ $agency->image_path }}"
            ],
            "logo": [
                "{{ $agency->image_path }}"
            ],
        }
    </script>
@endsection

@section('style')
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('/front') }}/css/timedropper.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/datedropper.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/lightcase.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/styles.css">
@stop

@section('content')

    <!-- START SECTION AGENTS DETAILS -->
    <section class="blog blog-section portfolio single-proper details mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <section class="headings-2 pt-0 hee">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <div class="text-heading text-left">
                                                <p><a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; <span><a
                                                            href="{{ route('front.agencies.index') }}">Agencies</a></span>
                                                </p>
                                            </div>
                                            <h3>Agencies Single</h3>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="news-item news-item-sm">
                                <a href="#" class="news-img-link">
                                    <div class="news-item-img homes">
                                        <div class="homes-tag button alt featured">{{ $agency->properties->count() }}
                                            Listings</div>
                                        <img class="resp-img" src="{{ $agency->image_path }}"
                                            alt="{{ $agency->name }}">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="#">
                                        <h3>{{ $agency->name }}</h3>
                                    </a>
                                    <div class="the-agents">
                                        <ul class="the-agents-details">
                                            <li><a href="#">Office: {{ $agency->office_number }}</a></li>
                                            <li><a href="#">Mobile: {{ $agency->mobile }}</a></li>
                                            <li><a href="#">Fax: {{ $agency->fax }}</a></li>
                                            <li><a href="#">Email: {{ $agency->email }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="{{ route('front.properties.index') }}" class="news-link">View My
                                            Listings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-pots py-0">
                        <div class="blog-info details mb-30">
                            <h5 class="mb-4">Description</h5>
                            {!! html_entity_decode($agency->description) !!}
                        </div>
                        <!-- START LISTING PROPERTIES -->
                        <section class="similar-property featured portfolio bshd p-0 bg-white">
                            <div class="container-px-0">
                                <h5>Listing</h5>
                                <div class="row">
                                    @foreach ($agency->properties as $property)
                                        <div class="item col-lg-6 col-md-6 col-xs-12 landscapes sale">
                                            <div class="project-single">
                                                <div class="project-inner project-head">
                                                    <div class="homes">
                                                        <!-- homes img -->
                                                        <a href="#" class="homes-img">
                                                            @if ($property->is_featured == 1)
                                                                <div class="homes-tag button alt featured">Featured</div>
                                                            @endif
                                                            @if ($property->rent_sale == 0)
                                                                <div class="homes-tag button sale">For Sale</div>
                                                            @else
                                                                <div class="homes-tag button sale rent">For Rent</div>
                                                            @endif
                                                            <img src="{{ $property->image_path }}"
                                                                alt="{{ $property->name }}" class="img-responsive">
                                                        </a>

                                                    </div>
                                                    <div class="button-effect">
                                                        <a href="single-property.html" class="btn"><i
                                                                class="fa fa-link"></i></a>
                                                        <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                            class="btn popup-video popup-youtube"><i
                                                                class="fas fa-video"></i></a>
                                                        <a href="single-property-2.html" class="img-poppu btn"><i
                                                                class="fa fa-photo"></i></a>
                                                    </div>
                                                </div>
                                                <!-- homes content -->
                                                <div class="homes-content">
                                                    <!-- homes address -->
                                                    <h3><a href="#">{{ $property->name }}</a></h3>
                                                    <p class="homes-address mb-3">
                                                        <a href="#">
                                                            <i class="fa fa-map-marker"></i><span>{{ $property->address }}
                                                                - {{ $property->city->name }},
                                                                {{ $property->country->name }}</span>
                                                        </a>
                                                    </p>
                                                    <!-- homes List -->
                                                    <ul class="homes-list clearfix">
                                                        <li>
                                                            <span>{{ $property->bedrooms }} Bedrooms</span>
                                                        </li>
                                                        <li>
                                                            <span>{{ $property->bathrooms }} Bathrooms</span>
                                                        </li>
                                                        <li>
                                                            <span>{{ $property->plot_area }} sq ft</span>
                                                        </li>
                                                        <li>
                                                            <span>{{ $property->garages }} Garages</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <!-- END LISTING PROPERTIES -->

                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        <!-- end author-verified-badge -->
                        <div class="sidebar">
                            <div class="main-search-field-2">
                                <div class="widget-boxed">
                                    <div class="widget-boxed-header">
                                        <h4>Recent Properties</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="recent-post">
                                            <div class="recent-main">
                                                <div class="recent-img">
                                                    <a href="blog-details.html"><img
                                                            src="{{ asset('/front') }}/images/feature-properties/fp-1.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="blog-details.html">
                                                        <h6>Family Home</h6>
                                                    </a>
                                                    <p>$230,000</p>
                                                </div>
                                            </div>
                                            <div class="recent-main my-4">
                                                <div class="recent-img">
                                                    <a href="blog-details.html"><img
                                                            src="{{ asset('/front') }}/images/feature-properties/fp-2.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="blog-details.html">
                                                        <h6>Family Home</h6>
                                                    </a>
                                                    <p>$230,000</p>
                                                </div>
                                            </div>
                                            <div class="recent-main">
                                                <div class="recent-img">
                                                    <a href="blog-details.html"><img
                                                            src="{{ asset('/front') }}/images/feature-properties/fp-3.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="blog-details.html">
                                                        <h6>Family Home</h6>
                                                    </a>
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
                                                            <span class="listing-compact-title">House Luxury <i>New
                                                                    York</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('/front') }}/images/feature-properties/fp-1.jpg"
                                                            alt="">
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
                                                            <span class="listing-compact-title">House Luxury <i>Los
                                                                    Angles</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('/front') }}/images/feature-properties/fp-2.jpg"
                                                            alt="">
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
                                                            <span class="listing-compact-title">House Luxury <i>San
                                                                    Francisco</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('/front') }}/images/feature-properties/fp-3.jpg"
                                                            alt="">
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
                                                            <span class="listing-compact-title">House Luxury <i>Miami
                                                                    FL</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('/front') }}/images/feature-properties/fp-4.jpg"
                                                            alt="">
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
                                                            <span class="listing-compact-title">House Luxury <i>Chicago
                                                                    IL</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('/front') }}/images/feature-properties/fp-5.jpg"
                                                            alt="">
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
                                                            <span class="listing-compact-title">House Luxury <i>Toronto
                                                                    CA</i></span>
                                                            <ul class="listing-hidden-content">
                                                                <li>Area <span>720 sq ft</span></li>
                                                                <li>Rooms <span>6</span></li>
                                                                <li>Beds <span>2</span></li>
                                                                <li>Baths <span>3</span></li>
                                                            </ul>
                                                        </div>
                                                        <img src="{{ asset('/front') }}/images/feature-properties/fp-6.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start: Specials offer -->
                                <div class="widget-boxed popular mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Specials of the day</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="banner"><img
                                                src="{{ asset('/front') }}/images/single-property/banner.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Specials offer -->
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS DETAILS -->

@stop

@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('/front') }}/js/jquery.min.js"></script>
    <script src="{{ asset('/front') }}/js/tether.min.js"></script>
    <script src="{{ asset('/front') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('/front') }}/js/mmenu.min.js"></script>
    <script src="{{ asset('/front') }}/js/mmenu.js"></script>
    <script src="{{ asset('/front') }}/js/slick.min.js"></script>
    <script src="{{ asset('/front') }}/js/slick4.js"></script>
    <script src="{{ asset('/front') }}/js/smooth-scroll.min.js"></script>
    <script src="{{ asset('/front') }}/js/ajaxchimp.min.js"></script>
    <script src="{{ asset('/front') }}/js/newsletter.js"></script>
    <script src="{{ asset('/front') }}/js/color-switcher.js"></script>
    <script src="{{ asset('/front') }}/js/timedropper.js"></script>
    <script src="{{ asset('/front') }}/js/datedropper.js"></script>
    <script src="{{ asset('/front') }}/js/inner.js"></script>

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
