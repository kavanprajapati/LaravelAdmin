<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{ asset('theme/production/images/favicon.ico') }}" type="image/ico" />
    <title>{{ isset($settings->app_name) ? $settings->app_name : Config::get('constants.app_name')  }}</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('theme/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('theme/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
	<link href="{{ asset('theme/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
	<!-- Select2 -->
	<link href="{{ asset('theme/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
	<!-- Switchery -->
	<link href="{{ asset('theme/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
	<!-- starrr -->
	<link href="{{ asset('theme/vendors/starrr/dist/starrr.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('theme/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('theme/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('theme/build/css/custom.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('theme/build/css/custom.min.css') }}" rel="stylesheet"> --}}
</head>
<body  class="nav-md">
    <div class="main-wrapper" id="app">
        <div class="container body">
            <div class="main_container">
                @include('admin.includes.sidebar')
                @include('admin.includes.header')
                    <div class="page-wrapper" style="min-height: 352px;">
                        @yield('content')
                    </div>
                @include('admin.includes.footer')
            </div>
        </div>
    </div>



    <!-- Modals -->
    <div class="modal fade bs-example-modal-xs" id="myActionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myActionModalLabel">Modal title</h4>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="myActionModalContent">My Modal content</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="MyActionModalBtn">Modal Action</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Modals -->


    <!-- jQuery -->
    <script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Popper JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
    <!-- Bootstrap -->
    <script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('theme/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('theme/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('theme/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('theme/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('theme/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('theme/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('theme/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('theme/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('theme/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('theme/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('theme/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('theme/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('theme/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('theme/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- bootstrap-wysiwyg -->
	<script src="{{ asset('theme/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
	<script src="{{ asset('theme/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
	<script src="{{ asset('theme/vendors/google-code-prettify/src/prettify.js') }}"></script>
	<!-- jQuery Tags Input -->
	<script src="{{ asset('theme/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
	<!-- Switchery -->
	<script src="{{ asset('theme/vendors/switchery/dist/switchery.min.js') }}"></script>
	<!-- Select2 -->
	<script src="{{ asset('theme/vendors/select2/dist/js/select2.full.min.js') }}"></script>
	<!-- Parsley -->
	{{-- <script src="{{ asset('theme/vendors/parsleyjs/dist/parsley.min.js') }}"></script> --}}
	<!-- Autosize -->
	<script src="{{ asset('theme/vendors/autosize/dist/autosize.min.js') }}"></script>
	<!-- jQuery autocomplete -->
	<script src="{{ asset('theme/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
	<!-- starrr -->
	<script src="{{ asset('theme/vendors/starrr/dist/starrr.js') }}"></script>

    <!-- Custom Theme Scripts -->
    {{-- <script src="{{ asset('theme/build/js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('theme/build/js/custom.js') }}"></script>
    <script src="{{ asset('theme/build/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
