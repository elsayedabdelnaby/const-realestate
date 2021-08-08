@extends('layouts.admin.app')

@section('title', 'Edit Project')

@section('content-header')
<div class="col-sm-6">
    <h1>Edit Project</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
    </ol>
</div>
@stop

@section('content')

<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">

            <form class="col-12" action="{{ route('admin.projects.update', $project->id) }}" method="post"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="row">

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="agency_id">Agency</label>
                        @error('agency_id')
                            <br />
                            <span class="text-danger mx-5">{{ $message }}</span>
                        @enderror
                        <select name="agency_id" class="form-control">
                            <option value="">All Agencies</option>
                            @foreach ($agencies as $agency)
                                <option value="{{ $agency->id }}"
                                    {{ $project->agency_id == $agency->id ? 'selected' : '' }}>
                                    {{ $project->agency->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div> {{-- end of agency --}}
                <hr>
                <div class="row">
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="{{ $locale }}[name]">Project Name in @lang('site.' . $locale .
                                    '.name')</label>
                                @error($locale . '.name')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                    value="{{ $project->translate($locale)->name }}">
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[description]">project Description in @lang('site.' .
                                    $locale . '.name')</label>
                                @error($locale . '.description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick ckeditor" type="text"
                                    name="{{ $locale }}[description]">
                                        {{ $project->translate($locale)->description }}
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[address]">Address in @lang('site.' . $locale .
                                    '.name')</label>
                                @error($locale . '.address')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick" type="text"
                                    name="{{ $locale }}[address]">
                                        {{ $project->translate($locale)->address }}
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[meta_title]">Project Meta Title in @lang('site.' .
                                    $locale . '.meta_title')</label>
                                @error($locale . '.meta_title')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_title]"
                                    value="{{ $project->translate($locale)->meta_title }}">
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[meta_keywords]">Project Meta Keywords in @lang('site.'
                                    . $locale . '.meta_keywords')</label>
                                @error($locale . '.meta_keywords')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_keywords]"
                                    value="{{ $project->translate($locale)->meta_keywords }}">
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[meta_description]">Project Meta Description in
                                    @lang('site.' . $locale . '.meta_description')</label>
                                @error($locale . '.meta_description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text"
                                    name="{{ $locale }}[meta_description]"
                                    value="{{ $project->translate($locale)->meta_description }}">
                            </div>

                            <div class="form-group">
                                <label for="{{ $locale }}[slug]">Project Meta Description in @lang('site.' .
                                    $locale . '.slug')</label>
                                @error($locale . '.slug')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                    value="{{ $project->translate($locale)->slug }}">
                            </div>

                        </div>
                    @endforeach
                </div> {{-- end of translatable data --}}

                <div class="row ">

                    <div class="form-group col-sm-12 col-lg-12 card card-primary card-outline">

                        <div class="text-center">
                            <h3 class="m-3">project Information</h3>
                            <hr>
                        </div>

                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr style="text-transform: capitalize">
                                    <th class="text-center">Is Active</th>
                                    <th class="text-center">Is Featured</th>
                                    <th class="text-center">Is Finished</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr style="text-transform: capitalize">
                                    <td>
                                        <label for="is_active">
                                            <input class="" type="checkbox" name="is_active"
                                                {{ $project->is_active == 1 ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                    <td>
                                        <label for="is_featured">
                                            <input class="" type="checkbox" name="is_featured"
                                                {{ $project->is_featured == 1 ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                    <td>
                                        <label for="finish_status">
                                            <input type="checkbox" name="finish_status"
                                                {{ $project->finish_status == 1 ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                </tr>

                            </tbody>

                        </table> {{-- end of table --}}

                        <!-- Area -->
                        <div class="row">

                            <div class="text-center col-12">
                                <h3 class="m-3">Area</h3>
                                <hr>
                            </div>

                            <div class="form-group col-sm-12 col-lg-3">
                                <label for="area_from">Area From</label>
                                @error('area_from')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="area_from" class="form-control"
                                    value="{{ $project->area_from }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-3">
                                <label for="area_to">Area To</label>
                                @error('area_to')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="area_to" class="form-control"
                                    value="{{ $project->area_to }}">
                            </div>
                        </div>

                        <div class="row">

                            <div class="text-center col-12">
                                <h3 class="m-3">Pricing</h3>
                                <hr>
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="price_from">Price From</label>
                                @error('price_from')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="price_from" class="form-control"
                                    value="{{ $project->price_from }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="price_to">Price To</label>
                                @error('price_to')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="price_to" class="form-control"
                                    value="{{ $project->price_to }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="meter_price">Meter Price</label>
                                @error('meter_price')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="meter_price" class="form-control"
                                    value="{{ $project->meter_price }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="price_to">Down Payment</label>
                                @error('downpayment')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="downpayment" class="form-control"
                                    value="{{ $project->downpayment }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="price_to">Installments Year</label>
                                @error('installments_years')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="number" name="installments_years" class="form-control"
                                    value="{{ $project->installments_years }}">
                            </div>

                        </div> {{-- end of Pricing row --}}

                    </div> {{-- end of form group for project Information --}}

                    <div class="form-group col-sm-12 card card-info card-outline">
                        <div class="row col-sm-12">
                            <div class="text-center col-sm-12 col-md-6 border-right">
                                <h3 class="m-3">Address Information</h3>
                                <hr>

                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="country">Country</label>
                                    @error('country')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="country_id" class="form-control">
                                        <option value="">All Countries</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $project->country_id == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="city">City</label>
                                    @error('city')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="city_id" class="form-control">
                                        <option value="">All Cities</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $project->city_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="text-center col-sm-12 col-md-6">
                                <h3 class="m-3">Google Maps</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="google_map_link">Google Map Link</label>
                                    @error('google_map_link')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="google_map_link" value="{{ $project->google_map_link }}"
                                        class="form-control">
                                </div>

                            </div>

                        </div>
                    </div> {{-- end of form group for Address Information --}}

                    <div class="form-group col-sm-12 card card-primary card-outline">
                        <div class="text-center col-sm-12">
                            <h3 class="m-3">project Media</h3>
                            <hr>
                        </div>
                        <div class="row col-sm-12">
                            <div class="text-center col-sm-12 col-md-4 border-right">
                                <h3 class="m-3">Card Image</h3>
                                <hr>

                                <div class="form-group col-sm-12 col-lg-12">
                                    <label>Image</label>
                                    @error('image')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="image" class="form-control input-sm image">

                                    <img src="{{ $project->image_path }}" width="100px"
                                        class="img-thumbnail image-preview mt-1" alt="">
                                </div> {{-- end of form group image --}}

                            </div>

                            <div class="text-center col-sm-12 col-md-4 border-right">
                                <h3 class="m-3">Video</h3>
                                <hr>

                                <div class="form-group col-sm-12 col-lg-12">
                                    <label for="video">Video</label>
                                    @error('video')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="video_link" class="form-control input-sm"
                                        value="{{ $project->video_link }}">
                                </div> {{-- end of form group image --}}
                            </div>
                        </div>
                    </div> {{-- end of project Media --}}

                    <div class="form-group col-sm-12 card card-primary card-outline">
                        <div class="text-center col-sm-12">
                            <h3 class="m-3">Gallery</h3>
                            <hr>
                        </div>


                        <div class="input-field">
                            <div class="gallery p-2">
                                @error('gallery')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div> {{-- end of project Media --}}

                    <div class="form-group col-sm-12 card card-primary card-outline">
                        <div class="text-center col-sm-12">
                            <h3 class="m-3">Sketches</h3>
                            <hr>
                        </div>


                        <div class="input-field">
                            <div class="sketches p-2">
                                @error('sketches')
                                    <br />
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div> {{-- end of project Media --}}


                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i>
                            Edit project</button>
                    </div>

                </div> {{-- end of  general data --}}

            </form><!-- end of form -->

        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->



@endsection

@section('script')
<!-- ARCHIVES JS -->
<script src="{{ asset('public/admin/js/image-uploader.min.js') }}"></script>

<script>
    let preloaded_gallery = [{{ $project->gallery_items }}];
    let preloaded_sketches = [{{ $project->sketches_items }}];

    $('.gallery').imageUploader({
        preloaded: preloaded_gallery,
        imagesInputName: 'gallery',
        preloadedInputName: 'gallery'
    });

    $('.sketches').imageUploader({
        preloaded: preloaded_sketches,
        imagesInputName: 'sketches',
        preloadedInputName: 'sketches'
    });
</script>
@stop
