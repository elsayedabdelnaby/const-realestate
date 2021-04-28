@extends('layouts.admin.app')

@section('title', 'Edit Property')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Property</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.properties.update', $property -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">

                        <div class="form-group col-sm-12 col-md-6">
                            <label for="agency_id">Agency</label>
                            @error('agency_id')
                            <br />
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <select name="agency_id" class="form-control">
                                <option value="all">All Agencies</option>
                                @foreach ($agencies as $agency)
                                    <option value="{{ $agency -> id }}" {{ $property->agency_id == $agency->id ? 'selected' : '' }}>{{ $property -> agency -> name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div> {{-- end of agency --}}
                    <hr>
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">property Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ $property -> translate($locale) -> name}}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[description]">property Description in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text" name="{{ $locale }}[description]">
                                        {{ $property -> translate($locale) -> description}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[address]">Address in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.address')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick" type="text" name="{{ $locale }}[address]">
                                        {{ $property -> translate($locale)-> address }}
                                    </textarea>
                                </div>

                            </div>
                        @endforeach
                    </div> {{-- end of translatable data --}}

                    <div class="row ">

                        <div class="form-group col-sm-12 col-lg-12 card card-primary card-outline">

                            <div class="text-center">
                                <h3 class="m-3">Property Information</h3>
                                <hr>
                            </div>

                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                <tr style="text-transform: capitalize">
                                    <th class="text-center">Is Active</th>
                                    <th class="text-center">For Sale</th>
                                    <th class="text-center">For Rent</th>
                                    <th class="text-center">Is Featured</th>
                                    <th class="text-center">Add To Homepage</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr style="text-transform: capitalize">
                                    <td>
                                        <label for="is_active">
                                            <input class="" type="checkbox" name="is_active" {{ $property -> is_active == 1 ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                    <td>
                                        <label for="rent_sale">
                                            <input class="" type="radio" name="rent_sale" {{ $property -> rent_sale == 0 ? 'checked' : '' }} value="sale">
                                        </label>
                                    </td>
                                    <td>
                                        <label for="rent_sale">
                                            <input class="" type="radio" name="rent_sale" {{ $property -> rent_sale == 1 ? 'checked' : '' }} value="rent">
                                        </label>
                                    </td>
                                    <td>
                                        <label for="is_featured">
                                            <input class="" type="checkbox" name="is_featured" {{ $property -> is_featured == 1 ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                    <td>
                                        <label for="add_to_home">
                                            <input type="checkbox" name="add_to_home" {{ $property -> add_to_home == 1 ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                </tr>

                                </tbody>

                            </table> {{-- end of table --}}

                            <div class="row">

                                <div class="text-center col-12">
                                    <h3 class="m-3">Rooms</h3>
                                    <hr>
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="rooms">Rooms</label>
                                    @error('rooms')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="rooms" class="form-control" value="{{ $property -> rooms }}">
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="bedrooms">Bedrooms</label>
                                    @error('bedrooms')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="bedrooms" class="form-control" value="{{ $property -> bedrooms }}">
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="bathrooms">Bathrooms</label>
                                    @error('bathrooms')
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="bathrooms" class="form-control" value="{{ $property -> bathrooms }}">
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="garages">Garages</label>
                                    @error('garages')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="garages" class="form-control" value="{{ $property -> garages }}">
                                </div>

                            </div> {{-- end of rooms row --}}

                            <div class="row">

                                <div class="text-center col-12">
                                    <h3 class="m-3">Area</h3>
                                    <hr>
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="plot_area">Plot Area</label>
                                    @error('plot_area')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="plot_area" class="form-control" value="{{ $property -> plot_area }}">
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="construction_area">Construction Area</label>
                                    @error('construction_area')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="construction_area" class="form-control" value="{{ $property -> construction_area }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="property_type_id">Property Type</label>
                                    @error('property_type_id')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="property_type_id" class="form-control">
                                        <option value="">All Types</option>
                                        @foreach ($property_types as $property_type)
                                           <option value="{{ $property_type -> id }}" {{ $property -> property_type_id == $property_type -> id ? 'selected' : '' }}>{{ $property_type -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="property_status_id">Property Status</label>
                                    @error('property_status_id')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="property_status_id" class="form-control">
                                        <option value="all">All Statuses</option>
                                        @foreach ($property_statuses as $property_status)
                                            <option value="{{ $property_status -> id }}" {{ $property -> property_status_id == $property_status -> id ? 'selected' : '' }}>{{ $property_status -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div> {{-- end of area row --}}

                            <div class="row">

                                <div class="text-center col-12">
                                    <h3 class="m-3">Pricing</h3>
                                    <hr>
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="price">Price</label>
                                    @error('price')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="number" name="price" class="form-control" value="{{ $property -> price }}">
                                </div>


                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="currency_id">Currency</label>
                                    @error('currency_id')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="currency_id" class="form-control">
                                        <option value="">All Currencies</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency -> id }}" {{ $property -> currency_id == $currency -> id ? 'selected' : '' }}>{{ $currency -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div> {{-- end of Pricing row --}}

                        </div> {{-- end of form group for Property Information --}}

                        <div class="form-group col-sm-12 card card-info card-outline">
                            <div class="row col-sm-12">
                                <div class="text-center col-sm-12 col-md-6 border-right">
                                    <h3 class="m-3">Address Information</h3>
                                    <hr>

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label for="country">Country</label>
                                        @error('country')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <select name="country_id" class="form-control">
                                            <option value="">All Countries</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country -> id }}" {{ $property -> country_id == $country -> id ? 'selected' : '' }}>{{ $country -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label for="city">City</label>
                                        @error('city')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <select name="city_id" class="form-control">
                                            <option value="">All Cities</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city -> id }}" {{ $property -> city_id   == $city -> id ? 'selected' : '' }}>{{ $city -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="text-center col-sm-12 col-md-6">
                                    <h3 class="m-3">Google Maps</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        @error('latitude')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                        <input type="text" name="latitude" class="form-control" value="{{ $property -> latitude }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        @error('longitude')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                        <input type="text" name="longitude" class="form-control" value="{{ $property -> longitude }}">
                                    </div>

                                </div>

                            </div>
                        </div> {{-- end of form group for Address Information --}}

                        <div class="form-group col-sm-12 card card-primary card-outline">
                            <div class="text-center col-sm-12">
                                <h3 class="m-3">Property Media</h3>
                                <hr>
                            </div>
                            <div class="row col-sm-12">
                                <div class="text-center col-sm-12 col-md-4 border-right">
                                    <h3 class="m-3">Card Image</h3>
                                    <hr>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        <label>Image</label>
                                        @error('image')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                        <input type="file" name="image" class="form-control input-sm image">

                                        <img src="{{ $property -> image_path }}" width="100px"
                                             class="img-thumbnail image-preview mt-1" alt="">
                                    </div> {{-- end of form group image --}}

                                </div>

                                <div class="text-center col-sm-12 col-md-4 border-right">
                                    <h3 class="m-3">Video</h3>
                                    <hr>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        <label for="video">Video</label>
                                        @error('video')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                        <input type="file" name="video" class="form-control input-sm">
                                    </div> {{-- end of form group image --}}
                                </div>

                                <div class="text-center col-sm-12 col-md-4 border-right">
                                    <h3 class="m-3">Floor plan</h3>
                                    <hr>

                                    <div class="form-group col-sm-12 col-lg-12">
                                        <label for="floor_plan">Floor Plan</label>
                                        @error('floor_plan')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                        <input type="file" name="floor_plan" class="form-control input-sm floor_plan">

                                        <img src="{{ $property -> floor_plan_path }}" width="100px"
                                             class="img-thumbnail floor_plan_preview mt-1" alt="">
                                    </div> {{-- end of form group image --}}
                                </div>
                            </div>
                        </div> {{-- end of property Media --}}

                        <div class="form-group col-sm-12 card card-primary card-outline">
                            <div class="text-center col-sm-12">
                                <h3 class="m-3">Gallery</h3>
                                <hr>
                            </div>


                            <div class="input-field">
                                <div class="gallery p-2">
                                    @error('gallery')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div> {{-- end of property Media --}}


                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i>
                                Edit Property</button>
                        </div>

                    </div> {{-- end of  general data --}}

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection

@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('public/admin/js/image-uploader.min.js') }}"></script>

    <script>

        let preloaded = [ {{ $property -> gallery_items }} ];

        $('.gallery').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'gallery',
            preloadedInputName: 'gallery'
        });
    </script>
@stop

