@extends('layouts.admin.app')

@section('title', 'SEO')

@section('content-header')
    <div class="col-sm-6">
        <h1>SEO <span class="small text-muted">{{ $seo_pages->total() }}</span></h1>
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

            <form action="{{ route('admin.seo.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <select name="search" class="form-control">
                            <option value="0">Select Page Name</option>
                            <option value="home">Home</option>
                            <option value="properties">Properties</option>
                            <option value="agencies">Agencies</option>
                            <option value="blog">Blog</option>
                            <option value="contact">Contact Us</option>
                            <option value="aboutus">About Us</option>
                        </select>
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('create_seo'))
                            <a href="{{ route('admin.seo.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Add SEO</a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add SEO</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($seo_pages->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Meta Title</th>
                            <th>Meta Keywords</th>
                            <th>Meta Description</th>
                            @if (auth()->user()->hasPermission('update_seo', 'delete_seo'))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($seo_pages as $index => $page)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $page->page_name }}</td>
                                <td>{{ $page->translate('en')->meta_title }}</td>
                                <td>{{ $page->translate('en')->meta_keywords }}</td>
                                <td>{{ $page->translate('en')->meta_description }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_seo'))
                                        <a href="{{ route('admin.seo.edit', $page->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i> Edit</a>
                                        {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_seo'))
                                        <form action="{{ route('admin.seo.destroy', $page->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger show_confirm btn-sm"><i
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

            {{ $seo_pages->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection

@section('script')

    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if (!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            }
        });
    </script>
@endsection
