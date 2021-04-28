@extends('layouts.admin.app')

@section('title', 'Create currency')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit currency</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.currencies.index') }}">currencies</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{--                        @include('partials._errors')--}}
                <form class="col-12" action="{{ route('admin.currencies.update', $currency -> id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    @foreach (config('translatable.locales') as $locale)
                        <div class="row">
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>currency Name in @lang('site.' . $locale . '.name')</label>
                                @error($locale . '.name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                       value="{{ $currency->translate($locale)-> name }}">
                            </div>

                        </div>

                    @endforeach

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>currency Symbol</label>
                            @error('symbol')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="symbol"
                                   value="{{ $currency -> symbol }}">
                            <small>Starts with "#", check <a target="_blank" href="https://www.toptal.com/designers/htmlarrows/currency/">This link for more information</a> </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Edit currency</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
