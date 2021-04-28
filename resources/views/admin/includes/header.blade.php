<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

{{--    <!-- SEARCH FORM -->--}}
{{--    <form class="form-inline ml-3">--}}
{{--        <div class="input-group input-group-sm col-sm-12">--}}
{{--            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-navbar" type="submit">--}}
{{--                    <i class="fa fa-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Languages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-language fa-lg"></i>
                Languages
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                {{ $properties['native'] }}
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>

                @endforeach

            </div>

        </li>

        <!-- Authentication Links -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt fa-lg"></i>
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
                   @csrf
                </form>
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
