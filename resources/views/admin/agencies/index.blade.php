@extends('layouts.admin.app')

@section('title', 'agencies')

@section('content-header')
    <div class="col-sm-6">
        <h1>agencies <span class="small text-muted">{{ $agencies->total() }}</span></h1>
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

            <form action="{{ route('admin.agencies.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_agencies'))
                            <a href="{{ route('admin.agencies.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add agency</a>
                             @else
                                <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> Add agency</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')
        @include('admin.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($agencies->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>E-Mail</th>
                    <th>Listing</th>
                    @if (auth()->user()->hasPermission('update_agencies','delete_agencies'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($agencies as $index=>$agency)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $agency -> name }}</td>
                        <td><img src="{{ $agency -> image_path }}" alt="{{ $agency -> name }}" width="50"/></td>
                        <td>{{ $agency -> email }}</td>
                        <td>
                            <a href="{{ route('admin.properties.index', ['agency_id' => $agency->id ]) }}" class="btn btn-primary btn-sm text-white"><i class="fa fa-eye"></i> View Listings</a>
                        </td>
                        <td>
                            @if (auth()->user()->hasPermission('update_agencies'))
                                <a href="{{ route('admin.agencies.edit', $agency->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('delete_agencies'))
                                <form action="{{ route('admin.agencies.destroy', $agency->id) }}" method="post" style="display: inline-block">
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

            {{ $agencies->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection

@section('script')

    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if(!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            }
        });
    </script>
@endsection
