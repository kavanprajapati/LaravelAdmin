@extends('admin.layouts.app')
@section('content')
@section('pageTitle', 'Settings')
<div class="content">
<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Settings</h3>
                </div>
            </div>
            <div class="clearfix"></div>
             @include('admin.success_error')
             @yield('action-content')
        </div>
    </div>
<!-- /page content -->
</div>
@endsection
