@extends('backend.master.index')

@section('title', 'Employee Information')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Employee Information</span>
@endsection

@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="card" style="height:100%;">
            <div class="tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab"><i class="fas fa-file-alt"></i> General</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#tab-2" data-toggle="tab" role="tab"><i class="fas fa-portrait"></i> Employment Tab</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#tab-3" data-toggle="tab" role="tab"><i class="fas fa-sign-out-alt"></i> Leaves Tab</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#tab-4" data-toggle="tab" role="tab"><i class="fas fa-calendar"></i> Work Calendar Tab</a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#tab-5" data-toggle="tab" role="tab"><i class="fas fa-pager"></i> Compensations, Taxes and Benefits Tab</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-1" role="tabpanel">
                            @include('backend.pages.payroll.transaction.employee_information.tabs.general_tab')
                        </div>
                        <div class="tab-pane" id="tab-2" role="tabpanel">
                            @include('backend.pages.payroll.transaction.employee_information.tabs.employment_tab')
                        </div>
                        <div class="tab-pane" id="tab-3" role="tabpanel">
                            @include('backend.pages.payroll.transaction.employee_information.tabs.leaves_tab')
                        </div>
                        <div class="tab-pane" id="tab-4" role="tabpanel">
                            <h4 class="tab-title">One more</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus eget condimentum rhoncus. Aenean massa. Cum sociis natoque
                                penatibus et magnis neque dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                                eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                        </div>
                        <div class="tab-pane" id="tab-5" role="tabpanel">
                            <h4 class="tab-title">One more</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus eget condimentum rhoncus. Aenean massa. Cum sociis natoque
                                penatibus et magnis neque dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                                eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        var employee_id = '';
        $(function() {
            
            $('body').delegate('#lookup tbody tr','click', function () {
                var data = $('#lookup').DataTable().row(this).data();
                generateRecord(data.id);
            });
            

            $('#general_form').submit(function(e) {
                e.preventDefault();
                var formData = $("#general_form").serialize();

                console.log($('#image').val());
                if(record_id === null) {
                    scion.record.add('/payroll/employee-information/save', formData + "&image=" + ($('#image').val() !== ''?cropzeeGetImage('image'):''), function(response) {
                        $('#employee_no').val(response.last_record.employee_no);
                        $('#datatables').DataTable().draw();
                        
                        $('.emp_no').text($('#employee_no').val());
                        $('.name').text($('#firstname').val() + ' ' + $('#lastname').val());
                        
                        $('.action-button .add').prop('disabled', false);
                        $('.action-button .delete').prop('disabled', false);

                        $('.nav-link:not(.active)').removeClass('disabled');
                    });
                }
                else {
                    scion.record.update('/payroll/employee-information/update', record_id, formData + "&image=" + ($('#image').val() !== ''?cropzeeGetImage('image'):''));
                }
            });
            
            $('#employment_tab').validate({
                submitHandler: function (form) {
                    var formData = {
                        "_token": "{{csrf_token()}}",
                        "employee_id": employee_id,
                        "classes_id": $('#classes_id').val(),
                        "position_id": $('#position_id').val(),
                        "department_id": $('#department_id').val(),
                        "employment_date": $('#employment_date').val(),
                        "tax_rate": $('#tax_rate').val(),
                    }

                    scion.record.add('/payroll/employment/save', formData);
                    return false;
                }
            });

        });

        function generateRecord(id){

            employee_id = id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/payroll/employee-information/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('#lookupModal').modal('hide');
                    record_id = id;

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                            if(k === "profile_img") {
                                $('#viewer').attr('src', '/images/employee/' + v);
                                $('.image-previewer').html('<img src="/images/employee/'+v+'" alt="" width="100%" id="viewer" data-cropzee="image">');
                            }
                        });
                        $.each(this.employment_tab, function(k, v) {
                            $('#'+k).val(v);
                        });
                        constructLeaveTab(this.leave_tab);
                    });
                    $('.emp_no').text($('#employee_no').val());
                    $('.name').text($('#firstname').val() + ' ' + $('#lastname').val());
                    
                    $('.action-button .add').prop('disabled', false);
                    $('.action-button .delete').prop('disabled', false);
                }
            });
            $('.nav-link:not(.active)').removeClass('disabled');

        }

        function resetForm() {
            employee_id = '';
            record_id = null;
            $("#general_form")[0].reset();
            $('#viewer').attr('src', '/images/employee/default.jpg');
            $('.nav-link:not(.active)').addClass('disabled');
            $('.action-button .add').prop('disabled', true);
            $('.action-button .delete').prop('disabled', true);
            $('.action-button .add').tooltip('hide');
        }

        function constructLeaveTab(data) {
            var html = '';

            $('.leaves').html('');
            
            $.each(data, (i,val)=>{
                addLeaves(function() {
                    var input_id = $('.leaves').children()[i].id;
                    $('#' + input_id + ' .leave_type').attr('field_id', val.id);
                    $('#' + input_id + ' .leave_type').val(val.leave_type);
                    $('#' + input_id + ' .total_hours').val(val.total_hours);

                });
            });
            
        }

    </script>
@endsection

@yield('leaves_tab')

@section('styles')
<style>
.nav-tabs a {
    padding: 10px 25px !important;
    background: #47b4ea !important;
    font-size: 12px;
    color: #fff !important;
}
.nav-tabs .nav-item {
    margin: 0px !important;
}
.nav-tabs a.nav-link.active {
    background: #fff !important;
    font-weight: normal !important;
    color: #000 !important;
}
.nav-tabs a.nav-link.disabled {
    background: #74ccf7 !important;
}
.image-previewer {
    width: 100%;
}
.light-modal-content {
    background: #fff !important;
}
.light-modal-footer>div {
    background: #3b7ddd;
}
.required {
    color: red;
    font-weight: bold;
}
#viewer {
    width: 100%;
}
ul.nav.nav-tabs {
    background: #47b4ea;
    border-radius: 3px;
}
.action-button {
    margin-bottom: 10px;
    border-bottom: 1px solid #ccc;
    background: #fff;
    padding: 3px;
}
.action-button button {
    border: 1px solid #eee !important;
    background: transparent;
    outline: none;
    color: #3282b8;
    padding: 10px 15px;
    color: #3f3f3f;
    transition: .3s;
}
.action-button button:hover {
    background: #3b7ddd;
    color: #fff;
}
main.content {
    margin: 0px;
    padding: 10px;
}
.employee-details {
    padding: 10px;
    background: #eee;
    font-weight: bold;
    margin: 0px;
    margin-bottom: 15px;
}
.action-button button[disabled] {
    background: #eee !important;
    cursor: not-allowed;
    color: gray;
}
.tab-content {
    padding: 10px !important;
    box-shadow: none !important;
}
</style>
@endsection
@stop