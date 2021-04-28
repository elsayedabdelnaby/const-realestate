@extends('layouts.admin.app')

@section('title', 'Add Feature to {{ $property -> name }}')

@section('content-header')
    <div class="col-sm-6">
        <h1>Features of {{ $property -> name }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">properties</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.properties.index') }}">{{ $property -> name }} Features</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="w-100" action="{{ route('admin.property.feature.store', $property -> id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">

                        <div class="card-body">

                            <div class="form-group col-sm-12 col-md-12 d-none">
                                <label for="property_id">Property Name</label>
                                <input type="hidden" id="property_id" name="property_id" value="{{ $property -> id }}">
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <table class="table table-striped table-bordered text-center">
                                    <h2>{{ $property -> name }} Features</h2>
                                    @error('feature_ids')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <thead name="featureIds[]">
                                    <tr>
                                        @foreach($features as $feature)
                                            <th>
                                                <input type="checkbox" name="featureIds[]" value="{{ $feature -> id }}" {{ $property -> features -> id == $feature -> id ? 'checked' : '' }}>
                                                <label for="featureIds">{{ $feature -> name }}</label>
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>


                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i>
                                Add Features</button>
                        </div> {{-- end of  general data --}}

                    </div>
                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@stop

