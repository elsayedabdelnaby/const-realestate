@extends('layouts.admin.app')

@section('title', 'Edit Why Choose Us')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit Why Choose Us</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.whychooseus.index') }}">Why Choose Us</a></li>
        </ol>
    </div>
@stop

@section('content')
@include('admin.partials._session')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.whychooseus.update', $whychooseus->id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Why Choose Us Title in @lang('site.' . $locale . '.title')</label>
                                @error($locale . '.title')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                    value="{{ $whychooseus->translate($locale)->title }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Description in @lang('site.' . $locale . '.description')</label>
                                @error($locale . '.description')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick" type="text"
                                    name="{{ $locale }}[description]">
                                                {{ $whychooseus->translate($locale)->description }}
                                            </textarea>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2 col-lg-2">
                            <label>Active ?</label>
                            <input type="checkbox" name="is_active" class="form-control" @if($whychooseus->is_active) checked @endif>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-lg-12">
                        <label>Logo</label>
                        @error('logo')
                            <span class="text-danger mx-1">{{ $message }}</span>
                        @enderror
                        <input type="file" name="image" class="form-control input-sm image" accept="jpg, png, jpeg, svg">

                        <img src="{{ $whychooseus->image_path }}" width="100px"
                            class="img-thumbnail image-preview mt-1" alt="">
                    </div> {{-- end of form group image --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Edit Why Choose Us</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
