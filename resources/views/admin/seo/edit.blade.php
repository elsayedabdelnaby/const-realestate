@extends('layouts.admin.app')

@section('title', 'Edit SEO Page')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit SEO Page</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.seo.index') }}">SEO</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.seo.update', $page->id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>Page Name</label>
                                <select name="page_name" class="form-control">
                                    <option value="0" disabled>Select Page Name</option>
                                    <option value="home" @if($page->page_name == 'home') selected @endif>Home</option>
                                    <option value="properties" @if($page->page_name == 'properties') selected @endif>Properties</option>
                                    <option value="agencies" @if($page->page_name == 'agencies') selected @endif>Agencies</option>
                                    <option value="blog" @if($page->page_name == 'blog') selected @endif>Blog</option>
                                    <option value="contact" @if($page->page_name == 'contact') selected @endif>Contact Us</option>
                                    <option value="aboutus" @if($page->page_name == 'aboutus') selected @endif>About Us</option>
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
                                    value="{{ $page->translate($locale)->meta_title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[meta_keywords]">Meta Keywords in @lang('site.' . $locale .
                                    '.meta_keywords')</label>
                                @error($locale . '.meta_keywords')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_keywords]" value="{{ $page->translate($locale)->meta_keywords }}">
                            </div>


                            <div class="form-group">
                                <label for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' . $locale .
                                    '.meta_description')</label>
                                @error($locale . '.meta_description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_description]" value="{{ $page->translate($locale)->meta_description }}">
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Edit SEO Page</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
