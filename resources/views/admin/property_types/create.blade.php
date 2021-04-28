@extends('layouts.admin.app')

@section('title', 'Create Property Type')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Property Type</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.property_types.index') }}">Property Types</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.property_types.store') }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    @foreach (config('translatable.locales') as $locale)
                        <div class="row">
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Property Type Name in @lang('site.' . $locale . '.name')</label>
                                @error($locale . '.name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                       value="{{ old($locale.'.name') }}">
                            </div>

                        </div>

                    @endforeach

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Add Property Type</button>
                            </div>

                        </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
