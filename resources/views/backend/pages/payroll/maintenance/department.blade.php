@extends('backend.master.index')

@section('title', 'Departments')

@section('breadcrumbs')
    <span>Maintenance</span>  /  <span class="highlight">Departments</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Department Maintenance Screen
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#departmentModal" style="float:right">
                        Add Department
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
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="save_record" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                            @csrf
                        <div class="form-group col-md-12">
                            <label for="">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
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
        $(function() {
           
           $('#datatables').DataTable({
               responsive: true,
               processing: true,
               serverSide: true,
               ajax: {
                   url: "/payroll/department/get",
                   type: "GET"
               },
               columns: [
                   { data: "DT_RowIndex", title:"#" },
                   { data: "description", title: "Description" },
                   { data: "id", title:"Action", render: function(data, type, row, meta) {
                       var html = "";
                       html += '<a href="#" class="align-middle edit" onclick="edit(' + row.id + ')" title="Edit" data-toggle="modal" data-target="#departmentModal"><i class="fas fa-pen"></i></a>';
                       html += '<a href="#"  onclick="deleteRecord('+row.id+')" data-toggle="modal" data-target="#deleteMessage"><i class="align-middle fas fa-fw fa-trash"></i></a>';
                       return html;
                   }}

               ]
           });

            $('.add').click(function(){
                $('.modal-title').text('Add Department');
                $('.submit-button').text('Add');
                $('#save_record')[0].reset();
                record_id = null;
            });

            $('#save_record').validate({
                submitHandler: function (form) {
                    var formData = $("#save_record").serialize();

                    if(record_id === null) {
                        scion.record.add('/payroll/department/save', formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#departmentModal').modal('hide');
                        });
                    }
                    else {
                        scion.record.update('/payroll/department/update', record_id, formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#departmentModal').modal('hide');
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
                url: '/payroll/department/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('.modal-title').text('Update Department');
                    $('.submit-button').text('Update');
                    record_id = id;
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                }
            });
        }
        
        function deleteRecord(id) {
            delete_func = scion.record.delete('/payroll/department/destroy', id,
            function() {
                $('#datatables').DataTable().draw();
            },
            function() {
                console.log('error');
            });
        }

    </script>
@endsection