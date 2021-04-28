@extends('layouts.admin.app')

@section('title', 'Create country')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create country</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.countries.index') }}">countries</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

{{--                        @include('partials._errors')--}}
                <form class="col-12" action="{{ route('admin.countries.store') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Country Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ old($locale.'.name') }}">
                                </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">

                            <div class="form-group col-sm-12 col-lg-12">
                                <label for="image">Flag</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image">

                                <img src="{{ asset('uploads/countries/default.png') }}" width="100px"
                                     class="img-thumbnail image-preview mt-1" alt="Image Preview">
                            </div> {{-- end of form group image --}}

                        </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Add country</button>
                            </div>

                        </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
