@extends('admin.layouts.login_layout')

@section('loginContent')
@section('pageTitle','Admin Login')
<div class="container">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="/login">
                        @csrf
                        <h1>Login Form</h1>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input placeholder="Email" type="text"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
                            @if ($errors->has('email'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input placeholder="Password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @if ($errors->has('password'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <br><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-left">{{ __('Login') }}</button>
                            <a class="btn btn-link pull-right"
                                href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </div>
                        <br /><br />
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw"></i>
                                    {{ isset($settings->app_name) ? $settings->app_name : Config::get('constants.app_name')  }}
                                </h1>
                                <p>&copy; {{ date('Y') }} All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
