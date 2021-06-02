<!-- Header Container
    ================================================== -->
<header id="header-container">
    <!-- Topbar -->
    <div class="header-top">
        <div class="container">
            <div class="top-info hidden-sm-down">
                <div class="call-header">
                    <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $contact_us_info->phone }} </p>
                </div>
                <div class="address-header">
                    <p class="location-url"><a href="{{ $contact_us_info->location_link }}" style><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $contact_us_info->location_title }} </a></p>
                </div>
                <div class="mail-header">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> {{ $contact_us_info->email }} </p>
                </div>
            </div>
            <div class="top-social hidden-sm-down">
                <div class="login-wrap">
                    <ul class="d-flex">
                        <li><a href="#"><i class="fa fa-user"></i> @lang('front.login')</a></li>
                        <li><a href="#"><i class="fa fa-sign-in"></i> @lang('front.register')</a></li>
                    </ul>
                </div>
                <div class="social-icons-header">
                    <div class="social-icons">
                        @if ($contact_us_info->facebook_url != '' && $contact_us_info->facebook_url != null)
                            <a href="{{ $contact_us_info->facebook_url }}"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a>
                        @endif

                        @if ($contact_us_info->twitter_url != '' && $contact_us_info->twitter_url != null)
                            <a href="{{ $contact_us_info->twitter_url }}"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></a>
                        @endif

                        @if ($contact_us_info->linkedin_url != '' && $contact_us_info->linkedin_url != null)
                            <a href="{{ $contact_us_info->linkedin_url }}"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a>
                        @endif

                        @if ($contact_us_info->instagram_url != '' && $contact_us_info->instagram_url != null)
                            <a href="{{ $contact_us_info->instagram_url }}"><i class="fa fa-instagram"
                                    aria-hidden="true" style="color:white;"></i></a>
                        @endif
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn-dropdown dropdown-toggle" type="button" id="dropdownlang" data-toggle="dropdown"
                        aria-haspopup="true">
                        <img src="{{ asset('public/front/images/' . LaravelLocalization::getCurrentLocale() . '.png') }}"
                            alt="lang" /> {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownlang">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img src="{{ asset('public/front/images/' . $localeCode . '.png') }}"
                                        alt="{{ $properties['native'] }}" />
                                    {{ $properties['native'] }}
                                </a>
                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar / End -->
    <!-- Header -->
    <div id="header">
        <div class="container">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="{{ route('front.index') }}"><img src="{{ asset($logo_path) }}"
                            alt="Real Estate Logo"></a>
                </div>
                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">
                        <li><a class="current" href="{{ route('front.index') }}">@lang('front.home')</a></li>
                        <li><a href="{{ route('front.properties.index') }}">@lang('front.properties')</a></li>
                        <li><a href="{{ route('front.agencies.index') }}">@lang('front.agencies')</a></li>
                        <li><a href="{{ route('front.blogs.index') }}">@lang('front.blog')</a></li>
                        <li><a href="contact-us.html">@lang('front.contact')</a>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side hidden-lg-down">
                <!-- Header Widget -->
                <div class="header-widget">
                    <a href="submit-property.html" class="button border">@lang('front.submit_property')</a>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<!-- Header Container / End -->
