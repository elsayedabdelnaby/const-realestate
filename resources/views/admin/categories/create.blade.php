@extends('layouts.admin.app')

@section('title', 'Create Category')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Category</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.categories.index') }}">Categorys</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.categories.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-lg-6">

                            <div class="form-group">
                                <label>Category Name in @lang('site.' . $locale . '.name')</label>
                                @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                    value="{{ old($locale . '.name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[meta_slug]">Slug in @lang('site.' . $locale .
                                    '.meta_slug')</label>
                                @error($locale . '.meta_slug')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_slug]" value="{{ old($locale . '.meta_slug') }}">
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Active ?</label>
                            <input type="checkbox" name="is_active" class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Category</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
