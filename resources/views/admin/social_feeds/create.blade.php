@extends('layouts.admin.app')

@section('title', 'Create Social Feed')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Social Feed</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.social-feeds.index') }}">Social Feeds</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.social-feeds.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>Title</label>
                                @error('title')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="title"
                                    value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Type">Type</label>
                                @error('type')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <select name="type" class="form-control">
                                    <option value="0" disabled>Select Type</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Linkedin">Linkedin</option>
                                    <option value="Instagram">Instagram</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>URL</label>
                                @error('url')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="url"
                                    value="{{ old('url') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Feed</label>
                                @error('feed')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="feed"
                                    value="{{ old('feed') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Display in Home ?</label>
                            <input type="checkbox" name="display_in_home" class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Social Feed</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
