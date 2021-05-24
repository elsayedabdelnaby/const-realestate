@extends('layouts.admin.app')

@section('title', 'Create Category')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Category</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.categories.index') }}">Property Types</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.categories.update', $category->id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Category Name in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                        value="{{ $category->translate($locale)->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' . $locale .
                                        '.meta_title')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_title]"
                                        value="{{ $category->translate($locale)->meta_title }}">
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
                                        value="{{ $category->translate($locale)->meta_keywords }}">
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
                                        value="{{ $category->translate($locale)->meta_description }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_slug]">Slug in @lang('site.' . $locale .
                                        '.meta_slug')</label>
                                    @error($locale . '.meta_slug')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_slug]"
                                        value="{{ $category->translate($locale)->meta_slug }}">
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Edit Category</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
