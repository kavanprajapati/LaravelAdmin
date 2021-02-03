@extends('admin.settings.base')
@section('action-content')
@section('pageTitle', 'App Settings')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>App Settings <small>(Global settings of the App)</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                        <a class="btn btn-round btn-primary edit-btn"
                        href="{{ route('admin.settings') }}"><i
                            class="fa fa-edit m-right-xs"></i>Edit Settings</a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">App Name:</th>
                                    <td>{{ $settings->app_name }}</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">App Email:</th>
                                    <td>{{ $settings->app_email }}</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">App Logo:</th>
                                    <td><img class="view-img" src="{{ Storage::url('settings/'.$settings->app_logo.'') }}"></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">App Favicon:</th>
                                    <td><img class="view-img" src="{{ Storage::url('settings/'.$settings->app_favicon.'') }}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
