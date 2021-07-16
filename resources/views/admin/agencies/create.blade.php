@extends('layouts.admin.app')

@section('title', 'Create agency')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create agency</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.agencies.index') }}">agencies</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.agencies.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Agency Name in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                        value="{{ old($locale . '.name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[description]">Agency Description in @lang('site.' .
                                        $locale . '.name')</label>
                                    @error($locale . '.description')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text"
                                        name="{{ $locale }}[description]"
                                        value="{{ old($locale . '.description') }}">{{ old($locale . '.description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[address]">Address in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.address')
                                        ` <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick" type="text"
                                        name="{{ $locale }}[address]">
                                        {{ old($locale . '.address') }}
                                    </textarea>
                                </div>

                                <!-- Meta Data -->
                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' . $locale .
                                        '.meta_title')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_title]"
                                        value="{{ old($locale . '.meta_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_keywords]">Meta Keywords in @lang('site.' .
                                        $locale .
                                        '.meta_keywords')</label>
                                    @error($locale . '.meta_keywords')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_keywords]"
                                        value="{{ old($locale . '.meta_keywords') }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' .
                                        $locale .
                                        '.meta_description')</label>
                                    @error($locale . '.meta_description')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_description]"
                                        value="{{ old($locale . '.meta_description') }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[slug]">Slug in @lang('site.' . $locale .
                                        '.slug')</label>
                                    @error($locale . '.slug')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[slug]" value="{{ old($locale . '.slug') }}">
                                </div>
                            <!-- End Meta Data -->

                    </div>
                    @endforeach
            </div>

            <div class="form-group col-sm-12 card card-info card-outline">
                <div class="row col-sm-12">
                    <div class="text-center col-sm-12">
                        <h3 class="m-3">Address Information</h3>
                        <hr>
                    </div>
                    <div class="text-center col-sm-12 col-md-6 border-right">
                        <h3 class="m-3">Location</h3>
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
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                            <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            @error('longitude')
                                <br />
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}">
                        </div>

                    </div>

                </div>
            </div> {{-- end of form group for Address Information --}}


            <div class="row pt-3">
                <div class="form-group col-sm-12 col-lg-6">
                    <label>E-Mail</label>
                    @error('email')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                    <input type="text" name="email" class="form-control form-control-sm input-sm"
                        value="{{ old('email') }}" required>
                </div>

                <div class="form-group col-sm-12 col-lg-6">
                    <label for="office_number">Office Number</label>
                    @error('office_number')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                    <input type="text" name="office_number" class="form-control form-control-sm input-sm"
                        value="{{ old('office_number') }}">
                </div>

                <div class="form-group col-sm-12 col-lg-6">
                    <label>Mobile</label>
                    @error('mobile')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                    <input type="text" name="mobile" class="form-control form-control-sm input-sm"
                        value="{{ old('mobile') }}">
                </div>

                <div class="form-group col-sm-12 col-lg-6">
                    <label>Fax</label>
                    @error('fax')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                    <input type="text" name="fax" class="form-control form-control-sm input-sm"
                        value="{{ old('fax') }}">
                </div>

                <div class="form-group col-sm-12 col-lg-12">
                    <label>Image</label>
                    @error('image')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                    <input type="file" name="image" class="form-control input-sm image">

                    <img src="{{ asset('uploads/agencies/default.png') }}" width="100px"
                        class="img-thumbnail image-preview mt-1" alt="">
                </div> {{-- end of form group image --}}

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                    Add agency</button>
            </div>

            </form><!-- end of form -->

        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
