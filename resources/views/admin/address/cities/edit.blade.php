@extends('layouts.admin.app')

@section('title', 'Edit city')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit city</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.cities.index') }}">cities</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{--                        @include('partials._errors')--}}
                <form class="col-12" action="{{ route('admin.cities.update', $city -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">city Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ $city->translate($locale)-> name }}">
                                </div>

                            </div>
                        @endforeach

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    @error('country_id')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="country_id" class="form-control">
                                        <option value="">All Countries</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country -> id }}" {{ $city->country_id == $country->id ? 'selected' : '' }}>{{ $country -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-lg-6">
                                <label>Image</label>
                                @error('image')
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image">

                                <img src="{{ $city->image_path }}" width="300px" class="img-thumbnail image-preview mt-1"
                                    alt="">
                            </div> {{-- end of form group image --}}

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Show in Home Page ?</label>
                            <input type="checkbox" name="show_in_homepage" class="form-control" @if($city->show_in_homepage) checked @endif>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Update city</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
