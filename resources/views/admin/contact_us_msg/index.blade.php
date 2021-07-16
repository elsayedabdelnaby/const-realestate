@extends('layouts.admin.app')

@section('title', 'Contact-us Messages')

@section('content-header')
    <div class="col-sm-6">
        <h1>Messages <span class="small text-muted">{{ $contactus_messages->total() }}</span></h1>
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

            <form action="{{ route('admin.contact-us.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..."
                            value="{{ request()->search }}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="email" class="form-control" placeholder="Email..."
                            value="{{ request()->email }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="phone" class="form-control" placeholder="Phone..."
                            value="{{ request()->phone }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <select name="type" class="form-control">
                            <option value="0">Select</option>
                            <option value="ContactUs" @if(request()->type == 'ContactUs') selected @endif>Contact Us</option>
                            <option value="Inquiry" @if(request()->type == 'Inquiry') selected @endif>Inquiry</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="0">Select</option>
                            <option value="new" @if(request()->status == 'new') selected @endif>New</option>
                            <option value="done" @if(request()->status == 'done') selected @endif>Done</option>
                        </select>
                    </div>
                    <div class="col-md-2 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($contactus_messages->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contactus_messages as $index => $message)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->text }}</td>
                                <td>{{ $message->type }}</td>
                                <td>{{ $message->status }}</td>
                            </tr>

                        @endforeach
                    </tbody>

                @else
                    <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                @endif

            </table><!-- end of table -->

            {{ $contactus_messages->appends(request()->query())->links() }}

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
