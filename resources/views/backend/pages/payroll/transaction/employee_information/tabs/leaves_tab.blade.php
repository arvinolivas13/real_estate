@include('backend.partial.flash-message')
<form id="leaves_tab" method="post">
    <div class="row header-bar">
        <div class="col-12">
            <div class="action-button">
                <button type="button" onclick="resetForm()" disabled  data-toggle="tooltip" data-placement="bottom" title="New Record" disabled>
                    <i class="fas fa-plus"></i>
                </button>
                <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Save Record">
                    <i class="fas fa-save"></i>
                </button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Record" disabled>
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-sm-12">
            <div class="employee-details row">
                <div class="col-6">
                    <div>Employee Number: <span class="emp_no">-</span></div>
                </div>
                <div class="col-6">
                    <div>Employee Name: <span class="name">-</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-sm-12">
            <div class="row">
                <div class="col-12 text-right">
                    <button class="btn btn-primary" type="button" onclick="addLeaves()"><i class="fas fa-plus"></i> Leave</button>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-sm-7">Select Leave Type</div>
                        <div class="col-xl-3 col-lg-5 col-sm-4">Total Hours</div>
                    </div>
                    <div class="leaves">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@section('leaves_tab')
<script>
var delete_item = [];

$(function() {
    
    $('#leaves_tab').validate({
        submitHandler: function (form) {
            var leave_record = [];

            $.each($('.leaves').children(), (i,v)=>{
                if($('#' + v.id + ' .leave_type').val() !== '') {
                    leave_record.push({
                        id: $('#' + v.id + ' .leave_type').attr('field_id'),
                        employee_id: employee_id,
                        code: $('#' + v.id + ' button.removeLeave').attr('item_id'),
                        leave_type: $('#' + v.id + ' .leave_type').val(), 
                        total_hours:  $('#' + v.id + ' .total_hours').val()
                    });
                }
            });

            scion.record.add('/payroll/leaves/save', { "_token": "{{csrf_token()}}", leave_record, delete_item }, function(response) {
                delete_item = [];
                $.each(response.data, (i, v)=>{
                    $('#leave_type_' + v.code).attr('field_id', v.id);
                });
            });

            return false;
        }
    });

    $('.leaves').delegate('.removeLeave', 'click', function(){
        var code = $(this).attr('item_id');

        if($('#leave_type_' + code).val() !== "") {
            delete_item.push({id: $('#leave_type_' + code).attr('field_id')});
        }
        $('#leave_field_' + code).remove();
    });

});

function addLeaves(callback) {
    var html = '';

    $.post('/api/leave-type/getData', {'_token': '{{csrf_token()}}'})
    .done(function(response) {
        var random_code = scion.create.random(6);

        html += '<div class="row leave_field" id="leave_field_'+random_code+'">';
        html += '<div class="col-xl-5 col-lg-5 col-sm-7">';
        html += '<div class="form-group">';
        html += '<select name="leave_type" class="form-control leave_type" id="leave_type_'+random_code+'" field_id="">';
        html += '<option value="">Please Select Leave Type</option>';

        $.each(response.leaveType, (i, v)=>{
            html += "<option value='" + v.id + "'>" + v.leave_name + "</option>";
        });
        
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-xl-3 col-lg-5 col-sm-4">';
        html += '<div class="form-group">';
        html += '<input type="number" value="0" min="0" class="form-control total_hours" name="total_hours" id="total_hours_'+random_code+'"/>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-1">';
        html += '<button type="button" class="btn btn-light removeLeave" item_id="'+random_code+'"><i class="fas fa-times"></i></button>';
        html += '</div>';
        html += '</div>';

        $('.leaves').append(html);

        if(typeof(callback) != "undefined") {
            callback();
        }
    });

}

</script>    
@endsection