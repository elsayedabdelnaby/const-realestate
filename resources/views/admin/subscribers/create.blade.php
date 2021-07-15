@extends('layouts.admin.app')

@section('title', 'Add Subscriber')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create Subscriber</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.subscribers.index') }}">Subscribers</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.subscribers.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label>Subscriber</label>
                                @error('email')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input type="email" value="{{ old('email')}}" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Subscriber</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
