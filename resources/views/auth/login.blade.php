@extends('layouts.front.app')

@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>@lang('front.login')</h1>
                <h2>
                    <a href="{{ route('front.index') }}"> @lang('front.home') </a>
                    &nbsp;/&nbsp; @lang('front.login')
                </h2>
            </div>
        </div>
    </section>

    <!-- START SECTION LOGIN -->
    <div id="login">
        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="access_social">
                    <a href="#0" class="social_bt facebook">@lang('front.login_with_facebook')</a>
                    <a href="#0" class="social_bt google">@lang('front.login_with_google')</a>
                    <a href="#0" class="social_bt linkedin">@lang('front.login_with_linkedin')</a>
                </div>
                <div class="divider"><span>@lang('front.or')</span></div>
                <div class="form-group">
                    <label>@lang('front.email')</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <i class="icon_mail_alt"></i>
                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('front.password')</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="fl-wrap filter-tags clearfix add_bottom_30 d-flex justify-content-between align-items-center">
                    <div class="checkboxes">
                            <input id="check-b" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('front.remember_me') }}
                            </label>
                    </div>
                    <div class="">
                        <a id="forgot" href="{{ route('password.request') }}">{{ __('front.forgot_your_password?') }}</a>
                    </div>
                </div>
                <button type="submit" class="btn_1 rounded full-width">
                    {{ __('front.login_to_find_houses') }}
                </button>
                <div class="text-center add_top_10">@lang('front.new_to_find_houses')?<strong><a
                            href="{{ route('register') }}">@lang('front.sign_up!')</a></strong></div>
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->

@endsection
