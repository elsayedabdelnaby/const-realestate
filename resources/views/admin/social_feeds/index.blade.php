@extends('layouts.admin.app')

@section('title', 'Social Feeds')

@section('content-header')
    <div class="col-sm-6">
        <h1>Social Feeds <span class="small text-muted">{{ $social_feeds->total() }}</span></h1>
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

            <form action="{{ route('admin.social-feeds.index') }}" method="get">

                <div class="row">

                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Search in Title" value="{{ request()->search }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="url" class="form-control" placeholder="Search in URL" value="{{ request()->search }}">
                    </div>

                    <div class="col-md-3">
                        <select name="type" class="form-control">
                            <option value="0">Select Type</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Linkedin">Linkedin</option>
                            <option value="Instagram">Instagram</option>
                        </select>
                    </div>

                    <div class="col-md-3 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_social_feeds'))
                            <a href="{{ route('admin.social-feeds.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Social Feed</a>
                             @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add Social Feed</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($social_feeds->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>URL</th>
                    <th>Display In Home</th>
                    @if (auth()->user()->hasPermission('update_social_feeds','delete_social_feed'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($social_feeds as $index=>$social_feed)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $social_feed->title }}</td>
                        <td>{{ $social_feed->type }}</td>
                        <td>{{ $social_feed->url }}</td>
                        <td>@if($social_feed->display_in_home) <i class="fa fa-check" aria-hidden="true"></i> @endif</td>
                        <td>
                            @if (auth()->user()->hasPermission('update_social_feeds'))
                                <a href="{{ route('admin.social-feeds.edit', $social_feed->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                            @endif
                            @if (auth()->user()->hasPermission('delete_social_feeds'))
                                <form action="{{ route('admin.social-feeds.destroy', $social_feed->id) }}" method="post" style="display: inline-block">
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

            {{ $social_feeds->appends(request()->query())->links() }}

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
