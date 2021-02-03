@extends('admin.profile.base')
@section('action-content')
@section('pageTitle','Admin Profile')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Admin Profile</h2>
                <div class="nav navbar-right panel_toolbox">
                    <a class="btn btn-round btn-primary edit-btn"
                        href="{{ route('admin.editprofile',['id'=>$adminData->id]) }}"><i
                            class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-4 col-sm-4  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                        <form id="adminImageForm" name="adminImageForm" enctype="multipart/form-data">
                                <label for="adminImage">
                                    <input type="file" id="adminImage" data-url="{{ route('admin.changeimage') }}" name="adminImage" accept="image/*" onchange="changeImage({{ Auth::user()->id }})"
                                        capture  style="display:none"/>
                                    <div class="avtar-admin">
                                        <img src="{{ Storage::url('admin/'.$adminData->profile.'') }}" id="adminImg" class="img-fluid avtar-view admin-avtar" alt="Profile Image" title="Change Image"/>
                                        <div class="pencil-icon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                    </div>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <ul class="list-unstyled user_data">
                        <li>
                            <i class="fa fa-user user-profile-icon"></i>
                            {{ isset($adminData->name) ? $adminData->name : '' }}
                        </li>
                        <li>
                            <i class="fa fa-envelope-o user-profile-icon"></i>
                            {{ isset($adminData->email) ? $adminData->email : '' }}
                        </li>
                        @if(isset($adminData->address))
                        <li>
                            <i class="fa fa-map-marker user-profile-icon"></i>
                            {{ isset($adminData->address) ? $adminData->address : '' }}
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
