<!-- footer content -->
<footer>
<div class="pull-right">
    All rights reserved &copy; {{ isset($settings->app_name) ? $settings->app_name : Config::get('constants.app_name')  }} - {{ date('Y') }}
</div>
<div class="clearfix"></div>
</footer>
<!-- /footer content -->
