@extends('layouts.admin.app')

@section('title', '{{ $blog -> name }}')

@section('content-header')
    <div class="col-sm-6">
        <h1>{{ $blog -> name }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.blogs.index') }}">blogs</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{--                        @include('partials._errors')--}}
                <form class="col-12">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">blog Name in @lang('site.' . $locale . '.name')</label>
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ $blog->translate($locale)-> name }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[description]">blog Description in @lang('site.' . $locale . '.name')</label>
                                    <textarea class="form-control input-thick ckeditor" type="text" name="{{ $locale }}[description]">{{ $blog->translate($locale)-> description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[address]">Address in @lang('site.' . $locale . '.name')</label>
                                    <textarea class="form-control input-thick" type="text" name="{{ $locale }}[address]">{{ $blog -> translate($locale)-> address }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group col-sm-12 card card-info card-outline">
                        <div class="row col-sm-12">
                            <div class="text-center col-sm-12 col-md-12">
                                <h3 class="m-3">Address Information</h3>
                                <hr>
                            </div>
                            <div class="text-center col-sm-12 col-md-6 border-right">
                                <h3 class="m-3">Location</h3>
                                <hr>

                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="country">Country</label>
                                    <select name="country_id" class="form-control">
                                        <option selected>{{ $blog -> country -> name }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="city">City</label>
                                    <select name="city_id" class="form-control">
                                        <option selected>{{ $blog -> city -> name }}</option>
                                    </select>
                                </div>

                            </div>

                            <div class="text-center col-sm-12 col-md-6">
                                <h3 class="m-3">Google Maps</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" class="form-control" value="{{ $blog -> latitude }}">
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" value="{{ $blog -> longitude }}">
                                </div>

                            </div>

                        </div>
                    </div> {{-- end of form group for Address Information --}}

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>E-Mail</label>
                            <input type="text" name="email" class="form-control form-control-sm input-sm disabled" value="{{ $blog -> email }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label for="office_number">Office Number</label>
                            <input type="text" name="office_number" class="form-control form-control-sm input-sm" value="{{ $blog -> office_number }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" class="form-control form-control-sm input-sm" value="{{ $blog -> mobile }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label for="fax">Fax</label>
                            <input type="text" name="fax" class="form-control form-control-sm input-sm" value="{{ $blog -> fax }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-12">
                            <img src="{{ $blog -> image_path }}" width="100px"
                                 class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}

                    </div>

{{--                    <div class="form-group">--}}
{{--                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>--}}
{{--                            Update blog</button>--}}
{{--                    </div>--}}

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
