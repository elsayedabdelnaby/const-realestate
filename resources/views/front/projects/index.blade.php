@extends('layouts.front.app')

@section('style')
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('/front') }}/css/timedropper.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/datedropper.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/menu.css">
    <link rel="stylesheet" href="{{ asset('/front') }}/css/slick.css">

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
                <h1>@lang('front.projects')</h1>
                <h2><a href="{{ route('front.index') }}">Home </a> &nbsp;/&nbsp; @lang('front.projects')</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION @lang('front.projects') LISTING -->
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
                                    <span class="hidden-sm-down">@lang('front.projects_listing')</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Block heading end -->
                    @foreach ($projects as $project)
                        <div class="row featured portfolio-items py-3">
                            @if ($project->is_active == 1)
                                <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0">
                                    <div class="project-single mb-0 bb-0">
                                        <div class="project-inner project-head">
                                            <div class="project-bottom">
                                                <h4><a
                                                        href="{{ route('front.projects.show', $project->translate(App::getLocale())->slug) }}">@lang('front.view_project')</a><span
                                                        class="category">{{ $project->translate(App::getLocale())->name }}</span>
                                                </h4>
                                            </div>
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="#" class="homes-img">
                                                    @if ($project->is_featured == 1)
                                                        <div class="homes-tag button alt featured">@lang('front.featured')
                                                        </div>
                                                    @endif
                                                    @if ($project->finish_status == 1)
                                                        <div class="homes-tag button sale">@lang('front.finished')</div>
                                                    @else
                                                        <div class="homes-tag button sale rent">@lang('front.not_finished')
                                                        </div>
                                                    @endif
                                                    <img src="{{ $project->image_path }}" alt="home-1"
                                                        class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                <a href="{{ route('front.projects.show', $project->translate(App::getLocale())->slug) }}"
                                                    class="btn"><i class="fa fa-link"></i></a>
                                                <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" target="_blank"
                                                    class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44">
                                    <!-- homes address -->
                                    <h3><a
                                            href="{{ route('front.projects.show', $project->translate(App::getLocale())->slug) }}">{{ $project->name }}</a>
                                    </h3>
                                    <p class="homes-address mb-3">
                                        <a
                                            href="{{ route('front.projects.show', $project->translate(App::getLocale())->slug) }}">
                                            <i class="fa fa-map-marker"></i><span>{{ $project->translate(App::getLocale())->address }}
                                                - {{ $project->city->translate(App::getLocale())->name }},
                                                {{ $project->country->translate(App::getLocale())->name }}</span>
                                        </a>
                                    </p>
                                    <!-- homes List -->
                                    <ul class="homes-list clearfix">
                                        <li>
                                            <span>@lang('front.area_from') {{ $project->area_from }}
                                                @lang('front.meter_square')</span>
                                        </li>
                                        <li>
                                            <span>@lang('front.area_to') {{ $project->area_to }}
                                                @lang('front.meter_square')</span>
                                        </li>
                                        <li>
                                            <span>@lang('front.price_from') {{ $project->price_from }} </span>
                                            <i class="fa fa-gbp" aria-hidden="true" style="color:#666;"></i>
                                        </li>
                                        <li>
                                            <span>@lang('front.price_to') {{ $project->price_to }}</span>
                                            <i class="fa fa-gbp" aria-hidden="true" style="color:#666;"></i>
                                        </li>
                                        <li>
                                            @if ($project->agency)
                                                <a href="{{ route('front.agencies.show', $project->agency->id) }}">
                                                    <i class="fa fa-building"></i>
                                                    {{ $project->agency->translate(App::getLocale())->name }}
                                                </a>
                                            @endif
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" style="color:#666;"></i>
                                                {{ $project->postedAt() }} @lang('front.days_ago')
                                            </span>
                                        </li>
                                    </ul>
                                    <!-- Price -->
                                    <div class="footer">
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
                                    <h5>@lang('front.search_projects')</h5>
                                    <div class="border"></div>
                                    <p>@lang('front.search_your_project')</p>
                                </div>
                            </div>
                        </div>
                        <!-- Search Fields -->
                        <div class="main-search-field">
                            <h5 class="title">@lang('front.filter')</h5>
                            <form method="GET">
                                <div class="at-col-default-mar mb-3">
                                    <select name="city_id">
                                        <option value="" selected>@lang('front.city')</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ request()->city_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->translate(App::getLocale())->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="at-col-default-mar mb-3">
                                    <select name="finish_status">
                                        <option value="" selected>@lang('front.finish')</option>
                                        <option value="1">@lang('front.finished')</option>
                                        <option value="0">@lang('front.not_finish')</option>
                                    </select>
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
                                        <button class="btn btn-default hvr-bounce-to-right"
                                            type="submit">@lang('front.search')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="recent-post py-5">
                            <h5 class="font-weight-bold mb-4">@lang('front.recent_projects')</h5>
                            @foreach ($recent_projects as $project)
                                <div class="recent-main my-4">
                                    <div class="recent-img">
                                        <a href="{{ route('front.properties.show', $project->translate(App::getLocale())->slug) }}"><img
                                                src="{{ $project->image_path }}"
                                                alt="{{ $project->translate(App::getLocale())->name }}"></a>
                                    </div>
                                    <div class="info-img">
                                        <a href="blog-details.html">
                                            <h6>{{ $project->translate(App::getLocale())->name }}</h6>
                                        </a>
                                        {{-- <p>$230,000</p> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="recent-post">
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
                        </div> --}}
                    </div>
                </aside>
            </div>

            {{ $projects->appends(request()->query())->links() }}

        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->

@endsection

@section('script')


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
