@extends('layouts.admin.app')

@section('title', 'Site Settings')

@section('content-header')
    <div class="col-sm-6">
        <h1>Site Settings</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        </ol>
    </div>
@stop

@section('content')

    @include('admin.partials._session')
    @include('admin.partials._errors')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.sitesettings.update', $site_settings->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">Title in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                        value="{{ $site_settings->translate($locale)->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' .
                                        $locale . '.meta_title')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_title]"
                                        value="{{ $site_settings->translate($locale)->meta_title }}">
                                </div>

                            </div>
                        @endforeach
                    </div> {{-- end of translatable data --}}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
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
                                        value="{{ $site_settings->translate($locale)->meta_description }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_keyword]">Meta Keyword in @lang('site.' .
                                        $locale . '.meta_keyword')</label>
                                    @error($locale . '.meta_keyword')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_keyword]"
                                        value="{{ $site_settings->translate($locale)->meta_keyword }}">
                                </div>

                            </div>
                        @endforeach

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>Image</label>
                            @error('logo')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="logo" class="form-control input-sm image" accept="jpg, png, jpeg, svg">

                            <img src="{{ $site_settings->logo_path }}" width="100px"
                                class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}

                    </div> {{-- end of translatable data --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            Update Site Settings</button>
                    </div>
                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
