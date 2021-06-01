@extends('layouts.admin.app')

@section('title', 'Update Blog')

@section('content-header')
    <div class="col-sm-6">
        <h1>Update Blog</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">Blog Title in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.title')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                        value="{{ $blog -> translate($locale)-> title }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[description]">Blog Description in @lang('site.' .
                                        $locale . '.name')</label>
                                    @error($locale . '.description')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text"
                                        name="{{ $locale }}[description]"
                                        value="">{{ $blog-> translate($locale)-> description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[creator]">Creator Name in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.creator')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[creator]"
                                        value="{{ $blog-> translate($locale)-> creator }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' . $locale .
                                        '.meta_title')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_title]" value="{{ $blog-> translate($locale)-> meta_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_keywords]">Meta Keywords in @lang('site.' .
                                        $locale .
                                        '.meta_keywords')</label>
                                    @error($locale . '.meta_keywords')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_keywords]" value="{{ $blog-> translate($locale)-> meta_keywords }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' .
                                        $locale .
                                        '.meta_description')</label>
                                    @error($locale . '.meta_description')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_description]"
                                        value="{{ $blog-> translate($locale)-> meta_description }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_slug]">Slug in @lang('site.' . $locale .
                                        '.meta_slug')</label>
                                    @error($locale . '.meta_slug')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_slug]" value="{{ $blog-> translate($locale)-> meta_slug }}">
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Active ?</label>
                            <input type="checkbox" name="is_active" class="form-control" @if($blog->is_active) checked @endif>
                        </div>
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>Show in Home Page ?</label>
                            <input type="checkbox" name="show_in_homepage" class="form-control" @if($blog->show_in_homepage) checked @endif>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Tags</label>
                            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if(in_array($tag->id, $blog_tags)) selected @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Category</label>
                            <select class="js-example-basic form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($blog->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row pt-3">

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>Image</label>
                            @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="image" class="form-control input-sm image">

                            <img src="{{ $blog->image_path }}" width="300px" class="img-thumbnail image-preview mt-1"
                                alt="">
                        </div> {{-- end of form group image --}}

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            Update Blog</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.js-example-basic-multiple').select2({
                placeholder: 'Select Tags'
            });
        });

    </script>
@endsection
