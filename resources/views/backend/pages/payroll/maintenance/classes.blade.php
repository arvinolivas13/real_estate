@extends('backend.master.index')

@section('title', 'Classes')

@section('breadcrumbs')
    <span>Maintenance</span> / <span class="highlight">Classes</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Classes Maintenance Screen
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#classModal" style="float:right">
                        Add Class
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
                                <th>Description</th>
                                <th>Tax Applicable</th>
                                <th>Government Mandated Benefits</th>
                                <th>Other Company Benefits</th>
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
<div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="save_record" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-3">
                        @csrf
                    <div class="form-group col-md-12">
                        <label for="">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" required/>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-check">
                            <input class="form-check-input" id="tax_applicable" name="tax_applicable" value="0" type="checkbox" onchange="checkVal(this.id)">
                            <span class="form-check-label">
                            Tax Applicable
                            </span>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-check">
                            <input class="form-check-input" id="government_mandated_benefits" name="government_mandated_benefits" value="0" type="checkbox" onchange="checkVal(this.id)">
                            <span class="form-check-label">
                            Government Mandated Benefits
                            </span>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-check">
                            <input class="form-check-input" id="other_company_benefits" name="other_company_benefits" value="0" type="checkbox" onchange="checkVal(this.id)">
                            <span class="form-check-label">
                            Other Company Benefits
                            </span>
                        </label>
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
                    url: "/payroll/classes/get",
                    type: "GET"
                },
                columns: [
                    { data: "DT_RowIndex", title:"#" },
                    { data: "description", title: "Description" },
                    { data: "tax_applicable", title: "Tax Applicable", render: function(data, type, row, meta) {
                        var html = "";
                        if(row.tax_applicable === 1) {
                            html = '<i class="fas fa-check text-success"></i>';
                        }
                        else {
                            html = '<i class="fas fa-times text-danger"></i>';
                        }
                        return html;
                    }},
                    { data: "government_mandated_benefits", title: "Government Mandated Benefits", render: function(data, type, row, meta) {
                        var html = "";
                        if(row.government_mandated_benefits === 1) {
                            html = '<i class="fas fa-check text-success"></i>';
                        }
                        else {
                            html = '<i class="fas fa-times text-danger"></i>';
                        }
                        return html;
                    }},
                    { data: "other_company_benefits", title: "Other Company Benefits", render: function(data, type, row, meta) {
                        var html = "";
                        if(row.other_company_benefits === 1) {
                            html = '<i class="fas fa-check text-success"></i>';
                        }
                        else {
                            html = '<i class="fas fa-times text-danger"></i>';
                        }
                        return html;
                    }},
                    { data: "id", title:"Action", render: function(data, type, row, meta) {
                        var html = "";
                        html += '<a href="#" class="align-middle edit" onclick="edit(' + row.id + ')" title="Edit" data-toggle="modal" data-target="#classModal"><i class="fas fa-pen"></i></a>';
                        html += '<a href="#" onclick="deleteRecord(' + row.id+ ')"><i class="align-middle fas fa-fw fa-trash"></i></a>';
                        return html;
                    }}

                ]
            });

            $('.add').click(function(){
                $('.modal-title').text('Add Class');
                $('.submit-button').text('Add');
                $('#save_record')[0].reset();
                record_id = null;
            });

            $('#save_record').validate({
                submitHandler: function (form) {
                    var formData = $("#save_record").serialize();

                    if(record_id === null) {
                        scion.record.add('/payroll/classes/save', formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#classModal').modal('hide');
                        });
                    }
                    else {
                        scion.record.update('/payroll/classes/update', record_id, formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#classModal').modal('hide');
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
                url: '/payroll/classes/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('.modal-title').text('Update Class');
                    $('.submit-button').text('Update');
                    $('#save_record')[0].reset();
                    record_id = id;

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            if(k === "tax_applicable" || k === "government_mandated_benefits" || k === "other_company_benefits"){
                                if(v === 1) {
                                    $("#"+k).prop('checked', true);
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
            delete_func = scion.record.delete('/payroll/classes/destroy', id,
            function() {
                $('#datatables').DataTable().draw();
            },
            function() {
                console.log('error');
            });
        }
        
    </script>
@endsection