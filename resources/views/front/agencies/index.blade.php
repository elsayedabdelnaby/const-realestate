@extends('layouts.front.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/timedropper.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/datedropper.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/slick.css">
@stop

@section('meta_tags')
    @include('front.partials.meta', [
    'title' => $meta_data->meta_title,
    'keywords' => $meta_data->meta_keywords,
    'description' => $meta_data->meta_description,
    'image' => '',
    ])
@endsection

@section('title')
    {{ $meta_data->meta_title }}
@endsection

@section('content')

    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Agencies</h1>
                <h2><a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; Agencies</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION BLOG -->
    <section class="blog blog-section portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <section class="headings-2 pt-0">
                        <div class="pro-wrapper">
                            <div class="detail-wrapper-body">
                                <div class="listing-title-bar">
                                    <div class="text-heading text-left">
                                        <p><a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; <span>List
                                                View</span></p>
                                    </div>
                                    <h3>Our Agencies</h3>
                                </div>
                            </div>
                            <div class="cod-pad single detail-wrapper mr-2 mt-4">
                                <div class="sorting-options">
                                    <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                                    <a href="#" class="change-view-btn lde"><i class="fa fa-th-large"></i></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="row">
                        @foreach ($agencies as $agency)
                            <div class="col-md-12 col-xs-12 space">
                                <div class="news-item news-item-sm">
                                    <a href="#" class="news-img-link">
                                        <div class="news-item-img homes">
                                            <div class="homes-tag button alt featured">
                                                {{ $agency->properties->count() }} Listings</div>
                                            <img class="resp-img" src="{{ $agency->image_path }}" alt="blog image">
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a href="{{ route('front.agencies.show', $agency->id) }}">
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
                                            <a href="properties-full-grid-2.html" class="news-link">View My Listings</a>
                                            <div class="admin">
                                                <p>{{ $agency->name }}</p>
                                                <img src="{{ asset($agency->getImagePathAttribute()) }}"
                                                    alt="{{ $agency->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        <!-- Start: Schedule a Tour -->
                        <div class="schedule widget-boxed mt-33 mt-0">
                            <div class="widget-boxed-header">
                                <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Schedule a Tour</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 book">
                                        <input type="text" id="reservation-date" data-lang="en" data-large-mode="true"
                                            data-min-year="2017" data-max-year="2020"
                                            data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0"
                                            data-theme="my-style" class="form-control" readonly="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 book2">
                                        <input type="text" id="reservation-time" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="row mrg-top-15 mb-3">
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <label class="mb-4">Adult</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[1]"
                                                class="border-0 text-center form-control input-number" data-min="0"
                                                data-max="10" value="0">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    data-type="plus" data-field="quant[1]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-4">
                                        <label class="mb-4">Children</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    disabled="disabled" data-type="minus" data-field="quant[2]">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[2]"
                                                class="border-0 text-center form-control input-number" data-min="0"
                                                data-max="10" value="0">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn counter-btn theme-cl btn-number"
                                                    data-type="plus" data-field="quant[2]">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a href="payment-method.html"
                                    class="btn reservation btn-radius theme-btn full-width mrg-top-10">Submit Request</a>
                            </div>
                        </div>
                        <!-- End: Schedule a Tour -->
                        <!-- end author-verified-badge -->
                        <div class="sidebar">
                            <div class="widget-boxed mt-33 mt-5">
                                <div class="sidebar-widget author-widget2">
                                    <div class="agent-contact-form-sidebar border-0 pt-0">
                                        <h4>Request Inquiry</h4>
                                        <form id="contactform" class="contact-form" name="contact_form" method="post">
                                            <div id="success" class="successform">
                                                <p class="alert alert-success font-weight-bold" role="alert">Your message
                                                    was sent successfully!
                                                </p>
                                            </div>
                                            <div id="error" class="errorform">
                                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                                            </div>
                                            @csrf
                                            <input type="hidden" name="url" id="url"
                                                value="{{ route('front.store.contact-us') }}">
                                            <input type="hidden" name="type" value="Inquiry">
                                            @auth
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="text" id="name" name="name" placeholder="Full Name" required
                                                    value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}" />
                                                <input type="number" id="pnumber" name="phone" placeholder="Phone Number"
                                                    required />
                                                <input type="email" id="emailid" name="email" placeholder="Email Address"
                                                    required value="{{ auth()->user()->email }}" />
                                            @endauth
                                            @guest
                                                <input type="text" id="name" name="name" placeholder="Full Name" required />
                                                <input type="number" id="pnumber" name="phone" placeholder="Phone Number"
                                                    required />
                                                <input type="email" id="emailid" name="email" placeholder="Email Address"
                                                    required />
                                            @endguest
                                            <textarea placeholder="Message" name="message" required></textarea>
                                            <input type="submit" id="submit-contact" name="sendmessage"
                                                class="multiple-send-message" value="Submit Request" />
                                        </form>
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
                                                    <a href="blog-details.html"><img
                                                            src="{{ asset('public/front/') }}/images/feature-properties/fp-1.jpg"
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
                                                            src="{{ asset('public/front/') }}/images/feature-properties/fp-2.jpg"
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
                                                            src="{{ asset('public/front/') }}/images/feature-properties/fp-3.jpg"
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
                                                        <img src="{{ asset('public/front/') }}/images/feature-properties/fp-1.jpg"
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
                                                        <img src="{{ asset('public/front/') }}/images/feature-properties/fp-2.jpg"
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
                                                        <img src="{{ asset('public/front/') }}/images/feature-properties/fp-3.jpg"
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
                                                        <img src="{{ asset('public/front/') }}/images/feature-properties/fp-4.jpg"
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
                                                        <img src="{{ asset('public/front/') }}/images/feature-properties/fp-5.jpg"
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
                                                        <img src="{{ asset('public/front/') }}/images/feature-properties/fp-6.jpg"
                                                            alt="">
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
            {{ $agencies->appends(request()->query())->links() }}
        </div>
    </section>
    <!-- END SECTION BLOG -->

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
