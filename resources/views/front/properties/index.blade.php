@extends('layouts.front.app')

@section('meta_tags')

    @include('front.partials.meta', [
    'title' => $meta_data->meta_title,
    'keywords' => $meta_data->meta_keywords,
    'description' => $meta_data->meta_description,
    'image' => '',
    ])

@endsection

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
                <h1>@lang('front.properties')</h1>
                <h2><a href="{{ route('front.index') }}">@lang('front.home') </a> &nbsp;/&nbsp; @lang('front.properties')
                </h2>
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
                                    <span class="hidden-sm-down">@lang('front.properties_listing')</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Block heading end -->
                    @foreach ($properties as $property)
                        <div class="row featured portfolio-items py-3">
                            @if ($property->is_active == 1)
                                <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0">
                                    <div class="project-single mb-0 bb-0">
                                        <div class="project-inner project-head">
                                            <div class="project-bottom">
                                                <h4><a href="{{ route('front.properties.show', $property->meta_slug) }}">View
                                                        Property</a><span
                                                        class="category">{{ $property->name }}</span></h4>
                                            </div>
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
                                                    <img src="{{ $property->image_path }}" alt="{{ $property->name }}"
                                                        class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="button-effect">
                                                @if ($property->video != '')
                                                    <a href="{{ $property->video }}"
                                                        class="btn popup-video popup-youtube"><i
                                                            class="fas fa-video"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44">
                                    <!-- homes address -->
                                    <h3><a
                                            href="{{ route('front.properties.show', $property->meta_slug) }}">{{ $property->name }}</a>
                                    </h3>
                                    <p class="homes-address mb-3">
                                        <a href="{{ route('front.properties.show', $property->meta_slug) }}">
                                            <i class="fa fa-map-marker"></i><span>{{ $property->address }} -
                                                {{ $property->city->name }},
                                                {{ $property->country->name }}</span>
                                        </a>
                                    </p>
                                    <!-- homes List -->
                                    <ul class="homes-list clearfix">
                                        <li>
                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                            <span>{{ $property->bedrooms }} @lang('bedrooms')</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-bath" aria-hidden="true"></i>
                                            <span>{{ $property->bathrooms }} @lang('bathrooms')</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-object-group" aria-hidden="true"></i>
                                            <span>{{ $property->plot_area }} m sq</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-warehouse" aria-hidden="true"></i>
                                            <span>{{ $property->garages }} @lang('garages')</span>
                                        </li>
                                    </ul>
                                    <!-- Price -->
                                    <div class="price-properties">
                                        <h3 class="title mt-3">
                                            <a href="{{ route('front.properties.show', $property->meta_slug) }}">$
                                                {{ $property->price }}</a>
                                        </h3>
                                    </div>
                                    <div class="footer">
                                        <a href="{{ route('front.agencies.show', $property->agency->id) }}">
                                            <i class="fa fa-building"></i> {{ $property->agency->name }}
                                        </a>
                                        <span>
                                            <i class="fa fa-calendar"></i> {{ $property->postedAt() }} Days ago
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
                            <h5 class="title">@lang('front.filter')</h5>
                            <form method="GET">
                                <div class="at-col-default-mar mb-3">
                                    <select name="city_id">
                                        <option value="" selected>@lang('front.city')</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ request()->city_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="at-col-default-mar mb-3">
                                    <select name="property_status">
                                        <option value="" selected>Property Status</option>
                                        @foreach ($property_statuses as $property_status)
                                            <option value="{{ $property_status->id }}"
                                                {{ request()->property_status == $property_status->id ? 'selected' : '' }}>
                                                {{ $property_status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="at-col-default-mar mb-3">
                                    <div class="at-col-default-mar">
                                        <select name="property_type">
                                            <option value="" data-show=".acitveon" selected>@lang('front.property_type')</option>
                                            @foreach ($property_types as $property_type)
                                                <option value="{{ $property_type->id }}"
                                                    {{ request()->property_type == $property_type->id ? 'selected' : '' }}>
                                                    {{ $property_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 no-pds">
                                    <div class="at-col-default-mar">
                                        <input class="at-input" type="number" name="min_area"
                                            placeholder="Meter Fit Min">
                                    </div>
                                </div>
                                <div class="col-lg-12 no-pds my-4">
                                    <div class="at-col-default-mar">
                                        <input class="at-input" type="number" name="max_area"
                                            placeholder="Meter Fit Max">
                                    </div>
                                </div>

                                <div class="col-lg-12 no-pds">
                                    <div class="at-col-default-mar">
                                        <button class="btn btn-default hvr-bounce-to-right" type="submit">@lang('front.search')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="recent-post py-5">
                            <h5 class="font-weight-bold mb-4">@lang('front.recent_properties')</h5>
                            @foreach ($recent_properties as $property)
                                <div class="recent-main py-2">
                                    <div class="recent-img">
                                        <a href="{{ route('front.properties.show', $property->meta_slug) }}"><img
                                                src="{{ $property->getImagePathAttribute() }}"
                                                alt="{{ $property->name }}"></a>
                                    </div>
                                    <div class="info-img">
                                        <a href="{{ route('front.properties.show', $property->meta_slug) }}">
                                            <h6>{{ $property->name }}</h6>
                                        </a>
                                        <p>{{ $property->price }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="recent-post">
                            <h5 class="font-weight-bold mb-4">@lang('front.popular_tags')</h5>
                            @for ($index = 0; $index < count($popular_tags); $index++)
                                <div class="tags">
                                    <span>
                                        <a href="{{ route('front.properties.index') . '?tag=' . $popular_tags[$index]->translate(App::getLocale())->slug }}"
                                            class="btn btn-outline-primary">{{ $popular_tags[$index]->translate(App::getLocale())->name }}</a>
                                    </span>
                                    @php ++$index @endphp
                                    @if (isset($popular_tags[$index]))
                                        <span>
                                            <a href="{{ route('front.properties.index') . '?tag=' . $popular_tags[$index]->translate(App::getLocale())->slug }}"
                                                class="btn btn-outline-primary">{{ $popular_tags[$index]->translate(App::getLocale())->name }}</a>
                                        </span>
                                    @endif
                                </div>

                            @endfor
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
