@extends('admin.settings.base')
@section('action-content')
@section('pageTitle', 'App Settings')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>App Settings <small>(Global settings of the App)</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="settings_form" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings') }}">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="app_name">App Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="app_name" name="app_name" value="{{ isset($settings->app_name)?$settings->app_name:old('app_name') }}" class="form-control{{ $errors->has('app_name') ? ' is-invalid' : '' }}">
                            @if ($errors->has('app_name'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('app_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="app_email">App Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="app_email" name="app_email" value="{{ isset($settings->app_email)?$settings->app_email:old('app_email') }}" class="form-control{{ $errors->has('app_email') ? ' is-invalid' : '' }}">
                            @if ($errors->has('app_email'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('app_email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="app_logo">App Logo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        @if(!empty($settings->app_logo))
                        <img id="imgPreview" class="view-img" src="{{ Storage::url('settings/'.$settings->app_logo.'') }}">
                        @else
                        <img id="imgPreview" class="view-img" src="{{ asset('theme/build/images/logo_placeholder.png') }}">
                        @endif
                            <input type="file" id="app_logo" name="app_logo" value="{{ isset($settings->app_logo)?$settings->app_logo:old('app_logo') }}" class="form-control{{ $errors->has('app_logo') ? ' is-invalid' : '' }}" onchange="previewImage(event)" style="color:transparent; border:none;" accept="image/*" title="{{ isset($settings->app_logo)?$settings->app_logo:old('app_logo') }}">
                            @if ($errors->has('app_logo'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('app_logo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="app_favicon">App Favicon <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            @if(!empty($settings->app_favicon))
                            <img id="imgPreview1"  class="view-img" src="{{ Storage::url('settings/'.$settings->app_favicon.'') }}">
                            @else
                            <img id="imgPreview1"  class="view-img" src="{{ asset('theme/build/images/logo_placeholder.png') }}">
                            @endif
                                <input type="file" id="app_favicon" name="app_favicon" value="{{ isset($settings->app_favicon)?$settings->app_favicon:old('app_favicon') }}" class="form-control{{ $errors->has('app_favicon') ? ' is-invalid' : '' }}" onchange="previewImage1(event)" style="color:transparent; border:none;" accept="image/*" title="{{ isset($settings->app_favicon)?$settings->app_favicon:old('app_favicon') }}">
                                @if ($errors->has('app_favicon'))
                                <span class="help-block pull-left">
                                    <strong>{{ $errors->first('app_favicon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="{{ route('admin.settings.show') }}" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
