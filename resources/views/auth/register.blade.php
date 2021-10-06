@extends('layouts.front.app')

@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>@lang('front.register')</h1>
                <h2><a href="{{ route('front.index') }}">@lang('front.home') </a> &nbsp;/&nbsp; @lang('front.register')
                </h2>
            </div>
        </div>
    </section>
    <!-- START SECTION 404 -->
    <div id="login">
        <div class="login">
            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label>@lang('front.your_name')</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <i class="ti-user"></i>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>@lang('front.your_email')</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>@lang('front.your_password')</label>
                    <input id="password1" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="form-group">
                    <label>@lang('front.confirm_password')</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    <i class="icon_lock_alt"></i>
                </div>
                <div id="pass-info" class="clearfix"></div>
                <button type="submit" class="btn_1 rounded full-width add_top_30">
                    @lang('front.register_now')!
                </button>
                <div class="text-center add_top_10">@lang('front.already_have_an_account')? <strong><a
                            href="{{ route('login') }}">@lang('front.sign_in')</a></strong></div>
            </form>
        </div>
    </div>
    <!-- END SECTION 404 -->
@endsection
