@extends('layouts.admin.app')

@section('title', 'Create People Say')

@section('content-header')
<div class="col-sm-6">
    <h1>Create People Say</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.people-says.index') }}">People Says</a></li>
    </ol>
</div>
@stop

@section('content')

<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">

            <form class="col-12" action="{{ route('admin.people-says.store') }}" method="POST">

                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            @error('name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="name" value="{{ old('name') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Job</label>
                            @error('job')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="job" value="{{ old('job') }}"
                                required>
                        </div>
                        <div class="form-group col-sm-12 col-lg-12">
                            <label>Image</label>
                            @error('image')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="image" class="form-control input-sm image" required>
                        </div> {{-- end of form group image --}}

                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label>URL</label>
                            @error('url')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="url" value="{{ old('url') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Say</label>
                            @error('say')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="say" value="{{ old('feed') }}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-lg-6">
                        <label>Is Active ?</label>
                        <input type="checkbox" name="is_active" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                        Add People Say</button>
                </div>

            </form><!-- end of form -->

        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->



@endsection
