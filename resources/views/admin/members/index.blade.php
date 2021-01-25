@extends('admin.members.base')
@section('action-content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Button Example <small>Users</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
            <p class="text-muted font-13 m-b-30">
              The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
            </p>
            <table id="members_table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
    </div>
        </div>
      </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $(function() {

    var res = $('#members_table').DataTable({
      processing: true,
	  serverSide: true,
	  stateSave: true,
      pageLength: 50,
		  ajax: {
			  url:  '{!! route('admin.members.data') !!}',
          },
      columns: [{ data: 'id', name: 'id' },
                { data: 'name', name: 'name'},
			    { data: 'email', name: 'email'},
			    { data: 'action', name: 'action', orderable: false, searchable: false},
               ],
      "columnDefs": [
        {
          "targets": 3,
				  "render": function ( data, type, row ) {
            return "<a href='' style='text-decoration: underline;' > Edit </a> &nbsp; "
            + "<a href='' style='text-decoration: underline;' class='deleteConfirmation text-danger'> Delete </a>";
          }
        },
      ]
    });

  });
</script>
@endpush
