@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>{{ $message }}</strong>
</div>
@endif

<!-- Show Error If No Row Selected While Performing Action (Active/Inactive/Delete) -->
<div id="message-red" class="alert alert-danger alert-dismissible " role="alert" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong id="message-red-err"></strong>
</div>
