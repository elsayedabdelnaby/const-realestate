<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Real-Esate Website">
    <meta name="author" content="Elsayed-Elaraby">
    @yield('meta_tags')
    <title>@yield('title')</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/front/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('public/front') }}/css/jquery-ui.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet.markercluster.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/leaflet.markercluster.default.css">

    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/lightcase.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/styles.css">
    <link rel="stylesheet" href="{{ asset('public/front/') }}/css/custom.css">
    <link rel="stylesheet" id="color" href="{{ asset('public/front/') }}/css/default.css">
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">
    @yield('style')
    @yield('header-scripts')
    <link rel="canonical" href="{{ Request::url() }}" />
</head>

<body class="inner-pages  {{ Route::is('front.agencies.*') ? 'agents homepage-4 det ag-de' : '' }}">

    <div id="wrapper">

        <!-- START SECTION HEADINGS -->
        @include('front.includes.header')

        @yield('content')

        @include('front.includes.footer')
        <script src="{{ asset('public/front/') }}/js/jquery.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/tether.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/mmenu.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/mmenu.js"></script>
        <script src="{{ asset('public/front/') }}/js/jquery.form.js"></script>
        <script src="{{ asset('public/front/') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/smooth-scroll.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/ajaxchimp.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/newsletter.js"></script>
        <script src="{{ asset('public/front/') }}/js/leaflet.js"></script>
        <script src="{{ asset('public/front/') }}/js/leaflet-gesture-handling.min.js"></script>
        <script src="{{ asset('public/front/') }}/js/leaflet-providers.js"></script>
        <script src="{{ asset('public/front/') }}/js/leaflet.markercluster.js"></script>
        <script src="{{ asset('public/front/') }}/js/map-single.js"></script>
        <script src="{{ asset('public/front/') }}/js/color-switcher.js"></script>
        <script src="{{ asset('public/front/') }}/js/inner.js"></script>
        <script src="{{ asset('public/js/iziToast.js') }}"></script>
        @yield('script')

    </div>
</body>

</html>
