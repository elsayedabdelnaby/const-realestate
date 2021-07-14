@extends('layouts.admin.app')

@section('title', 'Create Category')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create SEO Page</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.seo.index') }}">SEO Pages</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.seo.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>Page Name</label>
                                <select name="page_name" class="form-control">
                                    <option value="0" disabled>Select Page Name</option>
                                    <option value="home">Home</option>
                                    <option value="properties">Properties</option>
                                    <option value="agencies">Agencies</option>
                                    <option value="blog">Blog</option>
                                    <option value="contact">Contact Us</option>
                                    <option value="aboutus">About Us</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-lg-6">

                            <div class="form-group">
                                <label>Meta Title in @lang('site.' . $locale . '.meta_title')</label>
                                @error($locale . '.meta_title')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[meta_title]"
                                    value="{{ old($locale . '.meta_title') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[meta_keywords]">Meta Keywords in @lang('site.' . $locale .
                                    '.meta_keywords')</label>
                                @error($locale . '.meta_keywords')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_keywords]" value="{{ old($locale . '.meta_keywords') }}">
                            </div>


                            <div class="form-group">
                                <label for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' . $locale .
                                    '.meta_description')</label>
                                @error($locale . '.meta_description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_description]" value="{{ old($locale . '.meta_description') }}">
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add SEO Page</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
