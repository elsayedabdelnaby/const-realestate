@extends('layouts.admin.app')

@section('title', 'Create Tag')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Tag</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.tags.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Tag Name in @lang('site.' . $locale . '.name')</label>
                                @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                    value="{{ old($locale . '.name') }}" required>
                            </div>
                        @endforeach
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-sm-12 col-lg-6">
                                <label for="{{ $locale }}[slug]">Slug in @lang('site.' . $locale .
                                    '.slug')</label>
                                @error($locale . '.slug')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                    value="{{ old($locale . '.slug') }}">
                            </div>

                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Active ?</label>
                            <input type="checkbox" name="is_active" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Is Popular Tag ?</label>
                            <input type="checkbox" name="is_popular_tag" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Tag</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
