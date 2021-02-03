@extends('admin.layouts.login_layout')

@section('loginContent')
<div class="container">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="POST" action="{{ route('password.email') }}"">
                            @csrf
                            <h1>{{ __('Reset Password') }}</h1>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input placeholder="Email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email">
                                @if ($errors->has('email'))
                                <span class="help-block pull-left reset-pswd-validation">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-left">{{ __('Send Password Reset Link') }}</button>
                                <a class="btn btn-link pull-right"
                                    href="{{ route('login') }}">{{ __('Back to Login') }}</a>
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
