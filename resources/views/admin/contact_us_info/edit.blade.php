@extends('layouts.admin.app')

@section('title', 'Create currency')

@section('content-header')
    <div class="col-sm-6">
        <h1>Contact Us Info</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        </ol>
    </div>
@stop

@section('content')

    @include('admin.partials._session')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{--                        @include('partials._errors')--}}
                <form class="col-12" action="{{ route('admin.contactusinfo.update', $contact_us_info -> id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Phone</label>
                            @error('phone')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="phone"
                                   value="{{ $contact_us_info -> phone }}">
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Location Title</label>
                            @error('location_title')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="location_title"
                                   value="{{ $contact_us_info -> location_title }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Email</label>
                            @error('email')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="email"
                                   value="{{ $contact_us_info -> email }}">
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Location Link</label>
                            @error('location_link')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="location_link"
                                   value="{{ $contact_us_info -> location_link }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Facebook</label>
                            @error('facebook_url')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="facebook_url"
                                   value="{{ $contact_us_info -> facebook_url }}">
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Twitter</label>
                            @error('twitter_url')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="twitter_url"
                                   value="{{ $contact_us_info -> twitter_url }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Instagram</label>
                            @error('instagram_url')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="instagram_url"
                                   value="{{ $contact_us_info -> instagram_url }}">
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Linkedin</label>
                            @error('linkedin_url')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="linkedin_url"
                                   value="{{ $contact_us_info -> linkedin_url }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Working Start At</label>
                            @error('start_working_at')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="start_working_at"
                                   value="{{ $contact_us_info -> start_working_at }}">
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Working End At</label>
                            @error('end_working_at')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="end_working_at"
                                   value="{{ $contact_us_info -> end_working_at }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Edit Contact Us Info</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
