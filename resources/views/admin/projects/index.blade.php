@extends('layouts.admin.app')

@section('title', 'projects')

@section('content-header')
    <div class="col-sm-6">
        <h1>Projects <span class="small text-muted">{{ $projects->total() }}</span></h1>
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

            <form action="{{ route('admin.projects.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <label>
                            <select name="agency_id" class="form-control">
                                <option value="">All Agencies</option>
                                @foreach ($agencies as $agency)
                                    <option value="{{ $agency->id }}"
                                        {{ request()->agency_id == $agency->id ? 'selected' : '' }}>
                                        {{ $agency->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_projects'))
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i> Add Project</a>
                        @else
                            <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> Add Project</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($projects->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Agency Name</th>
                            <th>Project Info</th>
                            @if (auth()->user()->hasPermission('update_projects', 'delete_projects'))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($projects as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project->name }}</td>
                                <td>
                                    @if ($project->agency)
                                        <a
                                            href="{{ route('admin.agencies.show', $project->agency->id) }}">{{ $project->agency->name }}</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($project->is_active == 1)
                                        <span
                                            class="badge badge-pill badge-primary p-2">{{ $project->getActive() }}</span>
                                    @endif
                                    @if ($project->is_featured == 1)
                                        <span class="badge badge-pill bg-teal p-2">{{ $project->getFeatured() }}</span>
                                    @endif
                                    @if ($project->finish_status == 1)
                                        <span class="badge badge-pill bg-danger p-2">{{ $project->getFinishStatus() }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_projects'))
                                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                                            class="text-white btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_projects'))
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="button" class="btn btn-danger show_confirm btn-sm"><i
                                                    class="fa fa-trash"></i> Delete</button>
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

            {{ $projects->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection
