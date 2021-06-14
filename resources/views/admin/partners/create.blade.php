@extends('layouts.admin.app')

@section('title', 'Create Partner')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Partner</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.partners.index') }}">Partners</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.partners.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Partner Name in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                        value="{{ old($locale . '.name') }}">
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

                    <div class="row pt-3">

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>Image</label>
                            @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="logo" class="form-control input-sm image">

                            <img src="{{ asset('uploads/partners/default.jpg') }}" width="500px"
                                class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Partner</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.js-example-basic-multiple').select2({
                placeholder: 'Select Tags'
            });
        });

    </script>
@endsection
