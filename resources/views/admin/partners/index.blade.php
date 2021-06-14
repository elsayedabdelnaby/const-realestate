@extends('layouts.admin.app')

@section('title', 'Partners')

@section('content-header')
    <div class="col-sm-6">
        <h1>partners <span class="small text-muted">{{ $partners->total() }}</span></h1>
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

            <form action="{{ route('admin.partners.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_partners'))
                            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Partner</a>
                             @else
                                <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> Add Partner</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($partners->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Is Active ?</th>
                    @if (auth()->user()->hasPermission('update_Partners','delete_Partners'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($partners as $index=>$partner)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $partner -> name }}</td>
                        <td><img src="{{ $partner -> logo_path }}" alt="{{ $partner -> name }}" width="50"/></td>
                        <td>@if($partner -> is_active)<i class="fa fa-check" aria-hidden="true"></i> @endif </td>
                       <td>
                            @if (auth()->user()->hasPermission('update_partners'))
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('delete_partners'))
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="post" style="display: inline-block">
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

            {{ $partners->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection

@section('script')

@endsection
