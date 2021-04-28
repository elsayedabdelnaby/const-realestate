@extends('layouts.admin.app')

@section('title', 'Edit user')

@section('content-header')
    <div class="col-sm-6">
        <h1>Edit user</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">users</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.users.update', $user -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>First Name</label>
                            @error('first_name')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="first_name" class="form-control form-control-sm input-sm" value="{{ $user -> first_name }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Last Name</label>
                            @error('last_name')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="last_name" class="form-control form-control-sm input-sm" value="{{ $user -> last_name }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>E-Mail</label>
                            @error('email')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="email" name="email" class="form-control form-control-sm input-sm" value="{{ $user -> email }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>Image</label>
                            @error('image')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="image" class="form-control input-sm image">
                            <img src="{{ $user -> image_path }}" width="100px" class="img-thumbnail image-preview mt-1" alt="">
                        </div>

                        <div class="form-group col-sm-12 col-lg-12">

                            <div class="text-center m-b">
                                <h3 class="m-b-0">User Permissions</h3>
                            </div>

                            @php
                                $models = ['users'];
                                $permissions = ['create','read','update','delete'];
                            @endphp
                            <table class="table table-striped table-bordered m-l-lg text-center">
                                <thead>
                                <tr style="text-transform: capitalize">
                                    <th class="text-center"></th>
                                    @foreach( $permissions as $permission )
                                        <th class="text-center">{{ $permission }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($models as $index=>$model)
                                    <tr style="text-transform: capitalize">
                                        <td>{{ $model }}</td>

                                        @foreach($permissions as $permission)
                                            <td>
                                                <label for="checkboxPrimary[{{$index}}]"></label>
                                                <input  {{ $user -> hasPermission($permission . '_' . $model) ? 'checked' : '' }}
                                                       type="checkbox"
                                                       name="permissions[{{$index}}]"
                                                       value="{{ $permission . '_' . $model}}">
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach


                                </tbody>
                            </table> {{-- end of table --}}


                        </div> {{-- end of form group for permissions --}}

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary toastrDefaultSuccess"><i class="fa fa-plus"></i>
                            Edit user</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
