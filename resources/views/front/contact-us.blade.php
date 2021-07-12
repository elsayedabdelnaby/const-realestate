@extends('layouts.front.app')

@section('meta_tags')

{{-- @include('front.partials.meta', [
    'title' => $site_settings->title,
    'keywords' => $site_settings->meta_keyword,
    'description' => $site_settings->meta_description,
    'image' => $site_settings->logo_path,
    ]) --}}

@endsection

@section('title')
Contact Us
@endsection

@section('style')

@stop

@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Contact Us</h1>
            <h2><a href="index.html">Home </a> &nbsp;/&nbsp; Contact Us</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION CONTACT US -->
<section class="contact-us">
    <div class="container">
        <div class="property-location mb-5">
            <h3>Our Location</h3>
            <div class="divider-fade"></div>
            <div id="map-contact" class="contact-map"></div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h3 class="mb-4">Contact Us</h3>
                <form id="contactform" class="contact-form" name="contactform" method="post" novalidate action="{{ route('front.store.contact-us') }}">
                    @csrf
                    <input type="hidden" name="url" id="url" value="{{ route('front.store.contact-us')}}">
                    <div id="success" class="successform">
                        <p class="alert alert-success font-weight-bold" role="alert">Your message was sent successfully!</p>
                    </div>
                    <div id="error" class="errorform">
                        <p>Something went wrong, try refreshing and submitting the form again.</p>
                    </div>
                    @auth
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    @endauth
                    @guest
                    <div class="form-group">
                        <input type="text" required class="form-control input-custom input-full" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom input-full" name="email" placeholder="Email">
                    </div>
                    @endguest
                    <div class="form-group">
                        <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" id="submit-contact" class="btn btn-primary btn-lg">Submit</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-12 bgc">
                <div class="call-info">
                    <h3>Contact Details</h3>
                    <p class="mb-5">Please find below contact details and contact us today!</p>
                    <ul>
                        <li>
                            <div class="info">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p class="in-p">{{ $contact_us_info->location_title }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p class="in-p">{{ $contact_us_info->phone }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p class="in-p ti">{{ $contact_us_info->email }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="info cll">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <p class="in-p ti">{{ $contact_us_info->start_working_at }} - {{ $contact_us_info->end_working_at }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CONTACT US -->
@endsection


@section('script')
<script src="{{ asset('public/front/') }}/js/forms.js?v=1.0"></script>
@stop
