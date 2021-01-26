@extends('admin.members.base') @section('action-content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Members</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle action-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item active_all" data-url="{{ route('admin.members.Active') }}" data-text="member" data-pluraltext="members">Active</a>
                          <a class="dropdown-item Inactive_all" data-url="{{ route('admin.members.Inactive') }}" data-text="member" data-pluraltext="members">Inactive</a>
                          <a class="dropdown-item delete_all" data-url="{{ route('admin.members.deleteAll') }}" data-text="member" data-pluraltext="members">Delete</a>
                        </div>
                      </div>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="members_table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="master-check"></th>
                                        <th>#ID</th>
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
    $('#members_table').DataTable({
        Processing: true,
        ServerSide: true,
        pageLength: 10,
        columnDefs: [{
         'bSortable': false,
         'aTargets': [0,4]
       }],
       "aaSorting": [

        ],
        sAjaxSource: '{!! route('admin.members.data') !!}',
        columns: [
            { data: 'checkbox', name: 'checkbox' },
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action'},
        ],
    });
});
</script>
@endpush
