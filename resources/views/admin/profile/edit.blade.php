@extends('admin.profile.base')
@section('action-content')
@section('pageTitle', 'Edit Admin Profile')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Profile</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="profile_form" class="form-horizontal form-label-left" method="POST"
            enctype="multipart/form-data" action="{{ route('admin.updateprofile') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $adminData->id }}">
                    <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="name" name="name"
                                    value="{{ isset($adminData->name)?$adminData->name:old('name') }}"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                @if ($errors->has('name'))
                                <span class="help-block pull-left">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="email" name="email"
                                value="{{ isset($adminData->email)?$adminData->email:old('email') }}"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" disabled>
                            @if ($errors->has('email'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="address" name="address"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" cols="30"
                                rows="2">{{ isset($adminData->address)?$adminData->address:old('address') }}</textarea>
                            @if ($errors->has('address'))
                            <span class="help-block pull-left">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="{{ route('admin.profile',['id'=>$adminData->id]) }}"
                                class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
