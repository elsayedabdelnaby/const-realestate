@extends('layouts.admin.app')

@section('title', 'Countries')

@section('content-header')
    <div class="col-sm-6">
        <h1>Countries <span class="small text-muted">{{--{{ $countries->total() }}--}}</span></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Home</a></li>
        </ol>
    </div>

@endsection

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.countries.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_countries'))
                            <a href="{{ route('admin.countries.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add country</a>
                             @else
                                <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> Add country</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($countries->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Flag</th>
                    @if (auth()->user()->hasPermission('update_countries','delete_countries'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($countries as $index=>$country)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $country -> name }}</td>
                        <td><img src="{{ $country -> image_path }}" alt="{{ $country -> name }}" width="50"/></td>
                        <td>
                            @if (auth()->user()->hasPermission('update_countries'))
                                <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('delete_countries'))
                                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btn-danger show_confirm btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                </form><!-- end of form -->
                                {{-- @else
                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button> --}}
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>

            @else
                <h2 class="mt-5 text-center pt-2">No Data Found</h2>
            @endif

            </table><!-- end of table -->

            {{ $countries->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

    <div id="dialog-confirm"></div>

@endsection
