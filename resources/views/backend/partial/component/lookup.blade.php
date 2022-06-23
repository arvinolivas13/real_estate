
<label>{{$label}} <span class="required">*</span></label>
<div class="input-group mb-3 {{$id}}">
    <input type="text" class="form-control" placeholder="{{$placeholder}}" style="outline:none !important;" aria-label="{{$label}}" aria-describedby="basic-addon1" id="{{$id}}" name="{{$id}}" {{$disable===true?'disabled':''}}>
    <div class="input-group-prepend">
        <span class="input-group-text bg-primary text-light" id="primary_lookup" onclick="scion.create.sc_modal('lookup_{{$id}}', '{{$label}}', getLookup).show()"><i class="fas fa-search"></i></span>
    </div>
</div>

@section('sc-modal')
@parent
<div class="sc-modal-content" id="lookup_{{$id}}">
    <div class="sc-modal-dialog">
        <div class="sc-modal-header">
            <span class="sc-title-bar"></span>
            <span class="sc-close" onclick="scion.create.sc_modal('lookup_{{$id}}').hide()"><i class="fas fa-times"></i></span>
        </div>
        <div class="sc-modal-body">
            <table id="lookup_{{$id}}_table" class="table table-striped lookup" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@parent
<script>
    
    $(document).ready(function() {

        $('.sc-modal').delegate('#lookup_{{$id}}_table tbody tr','dblclick', function () {
            var data = $('#lookup_{{$id}}_table').DataTable().row(this).data();
            
            scion.record.edit(module_url+'/edit/', data.id);
            scion.create.sc_modal('lookup_{{$id}}', '').hide();
            scion.centralized_button(false, false, false, true);
            
            $('.tab-list-menu-item ').removeAttr('disabled');

        });
    });

    function getLookup() {
        scion.lookup('lookup_{{$id}}_table', '{{$url}}', '{{json_encode($data, true)}}'.replace(/&quot;/g,'"'));
    }

    
</script>
@endsection

