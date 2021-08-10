@extends('layouts.admin.app')

@section('title', 'People Says')

@section('content-header')
    <div class="col-sm-6">
        <h1>People Says<span class="small text-muted">{{ $people_says->total() }}</span></h1>
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

            <form action="{{ route('admin.people-says.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control" placeholder="Search in Name" value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="job" class="form-control" placeholder="Search in Job" value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_people_says'))
                            <a href="{{ route('admin.people-says.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add People Say</a>
                             @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add People Say</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($people_says->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Say</th>
                    <th>Is Active?</th>
                    @if (auth()->user()->hasPermission('update_people_says','delete_people_say'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($people_says as $index=>$people_say)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $people_say->name }}</td>
                        <td>{{ $people_say->job }}</td>
                        <td>{{ $people_say->say }}</td>
                        <td>@if($people_say->is_active) <i class="fa fa-check" aria-hidden="true"></i> @endif</td>
                        <td>
                            @if (auth()->user()->hasPermission('update_people_says'))
                                <a href="{{ route('admin.people-says.edit', $people_say->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                            @endif
                            @if (auth()->user()->hasPermission('delete_people_says'))
                                <form action="{{ route('admin.people-says.destroy', $people_say->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger show_confirm btn-sm"><i class="fa fa-trash"></i> Delete</button>
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

            {{ $people_says->appends(request()->query())->links() }}

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
