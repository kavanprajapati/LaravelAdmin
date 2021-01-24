@extends('admin.members.base')
@section('action-content')
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">App Name <span class="required">*</span>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">App Email <span class="required">*</span>
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
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="{{ route('admin.home') }}" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
