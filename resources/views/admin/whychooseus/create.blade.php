@extends('layouts.admin.app')

@section('title', 'Create Property Type')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Why choose Us</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.whychooseus.index') }}">Why Choose Us</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.whychooseus.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="row">
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Title in @lang('site.' . $locale . '.title')</label>
                                @error($locale . '.title')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                    value="{{ old($locale . '.title') }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Description in @lang('site.' . $locale . '.description')</label>
                                @error($locale . '.description')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick" type="text"
                                    name="{{ $locale }}[description]">
                                            {{ old($locale . '.description') }}
                                        </textarea>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="form-group col-sm-2 col-lg-2">
                            <label>Active ?</label>
                            <input type="checkbox" name="is_active" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-lg-12">
                        <label>Image</label>
                        @error('image')
                            <span class="text-danger mx-1">{{ $message }}</span>
                        @enderror
                        <input type="file" name="image" class="form-control input-sm image" required>

                        <img src="{{ asset('uploads/whychooseus/default.svg') }}" width="100px"
                            class="img-thumbnail image-preview mt-1" alt="">
                    </div> {{-- end of form group image --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Why Choose Us</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
