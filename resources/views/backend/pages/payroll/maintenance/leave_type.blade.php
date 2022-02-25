@extends('backend.master.index')

@section('title', 'Leave Type')

@section('breadcrumbs')
    <span>Maintenance</span> / <span class="highlight">Leave Type</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Leave Type Maintenance Screen
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#leaveTypeModal" style="float:right">
                        <i class="fas fa-plus"></i> Leave Type
                    </button>
                </h5>
            </div>
            @include('backend.partial.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Units</th>
                                <th>Normal Entilement</th>
                                <th>Paid Leave</th>
                                <th>Show On Payslip</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="leaveTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="save_record" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Leave Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-3 row">
                    @csrf
                    <div class="form-group col-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="leave_name" name="leave_name" required/>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Units</label>
                        <input type="number" class="form-control" id="units" name="units" value="0" min="0" required/>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Normal Entilement</label>
                        <input type="number" class="form-control" id="normal_entilement" value="0" min="0" name="normal_entilement" required/>
                    </div>
                    <div class="form-group col-6">
                        <label>Paid Leave</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paid_leave" id="paid_leave1" value="1" checked>
                            <label class="form-check-label" for="paid_leave1">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paid_leave" id="paid_leave2" value="0">
                            <label class="form-check-label" for="paid_leave2">No</label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Show on Payslip</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="show_on_payslip" id="show_on_payslip1" value="1" checked>
                            <label class="form-check-label" for="show_on_payslip1">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="show_on_payslip" id="show_on_payslip2" value="0">
                            <label class="form-check-label" for="show_on_payslip2">No</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit-button">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- MODAL --}}
                    
                    
    @stop

    @section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        var deleteClasses=null;
        $(function() {
            $('#datatables').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/payroll/leave-type/get",
                    type: "GET"
                },
                columns: [
                    { data: "DT_RowIndex", title:"#" },
                    { data: "leave_name", title: "Leave Name" },
                    { data: "units", title: "Units" },
                    { data: "normal_entilement", title: "Normal Entilement" },
                    { data: "paid_leave", title: "Paid Leave", render: function(data, type, row, meta) {
                        var html = "";
                        if(row.paid_leave === 1) {
                            html = '<i class="fas fa-check text-success"></i>';
                        }
                        else {
                            html = '<i class="fas fa-times text-danger"></i>';
                        }
                        return html;
                    }},
                    { data: "show_on_payslip", title: "Show on Payslip", render: function(data, type, row, meta) {
                        var html = "";
                        if(row.show_on_payslip === 1) {
                            html = '<i class="fas fa-check text-success"></i>';
                        }
                        else {
                            html = '<i class="fas fa-times text-danger"></i>';
                        }
                        return html;
                    }},
                    { data: "id", title:"Action", render: function(data, type, row, meta) {
                        var html = "";
                        html += '<a href="#" class="align-middle edit" onclick="edit(' + row.id + ')" title="Edit" data-toggle="modal" data-target="#leaveTypeModal"><i class="fas fa-pen"></i></a>';
                        html += '<a href="#" onclick="deleteRecord(' + row.id+ ')"><i class="align-middle fas fa-fw fa-trash"></i></a>';
                        return html;
                    }}

                ]
            });

            $('.add').click(function(){
                $('.modal-title').text('Add Leave Type');
                $('.submit-button').text('Add');
                $('#save_record')[0].reset();
                record_id = null;
            });

            $('#save_record').validate({
                submitHandler: function (form) {
                    var formData = $("#save_record").serialize();

                    if(record_id === null) {
                        scion.record.add('/payroll/leave-type/save', formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#leaveTypeModal').modal('hide');
                        });
                    }
                    else {
                        scion.record.update('/payroll/leave-type/update', record_id, formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#leaveTypeModal').modal('hide');
                        },
                        function() {});
                    }

                    return false;
                }
            });
        });
        

        function edit(id){
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/payroll/leave-type/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('.modal-title').text('Update Leave Type');
                    $('.submit-button').text('Update');
                    $('#save_record')[0].reset();
                    record_id = id;

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            if(k === "paid_leave" || k === "show_on_payslip"){
                                if(v === 1) {
                                    $("#"+k+'1').prop('checked', true);
                                }
                                else {
                                    $("#"+k+'2').prop('checked', true);
                                }
                            }
                            $('#'+k).val(v);
                        });
                    });
                }
            });
        }

        function checkVal(id) {
            if($('#'+id).prop('checked') === true) {
                $('#'+id).val('1');
            }
            else {
                $('#'+id).val('0')
            }
        }

        function deleteRecord(id) {
            delete_func = scion.record.delete('/payroll/leave-type/destroy', id,
            function() {
                $('#datatables').DataTable().draw();
            });
        }
        
    </script>
@endsection