<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/front/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/jquery-ui.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('/front/') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('/front/') }}/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('/front/') }}/css/custom.css">

    @yield('style')

    <link rel="canonical" href="{{Request::url()}}" />
</head>

<body class="inner-pages  {{ Route::is('front.agencies.*') ? 'agents homepage-4 det ag-de' : '' }}">

<div id="wrapper">

    <!-- START SECTION HEADINGS -->
    @include('front.includes.header')

    @yield('content')

   @include('front.includes.footer')

    @yield('script')

</div>
</body>

</html>
