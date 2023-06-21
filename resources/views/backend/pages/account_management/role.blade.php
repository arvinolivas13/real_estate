@extends('backend.master.template')

@section('title', 'Roles')

@section('breadcrumbs')
    <span><a href="#" style="color:#fff;">Account Management</a></span> / <span class="highlight">Roles</span>
@endsection


@section('content')
<div class="main">
<div class="row">
    @include('backend.partial.flash-message')
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>ROLES</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#roleModal" style="float:right" onclick="clearField()">
                        ADD ROLES
                    </button>
                </div>
                <div class="card-body">
                    <table id="roles_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ROLES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="form-group col-12 name">
                        <label for="name">ROLE NAME</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary" onclick="saveRecord()">SAVE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CONFIRMATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">ARE YOU SURE YOU WANT TO DELETE THIS RECORD?</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <button type="button" class="btn btn-success" onclick="deleteRecord()">YES</button>
            </div>
        </div>
    </div>
</div>

</div>
@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        var table;
        var action = "save";
        var hold_id = null;

        $(function() {
            table = $('#roles_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/user/roles_get',
                    type: 'GET'
                },
                columns: [
                    { data: null, title: 'ACTION', render: function(data, type, row, meta) {
                        var html = "<td>";
                            html += "<a href='#' class='align-middle edit' onclick='edit("+row.id+")' title='EDIT'><i class='align-middle fas fa-fw fa-pen'></i></a>";
                            html += "<a href='#' class='align-middle edit' onclick='confirmDelete("+row.id+")' title='DELETE'><i class='align-middle fas fa-fw fa-trash'></i></a>";
                            html += "</td>";
                        return html;
                    }},
                    { data: 'name', title: 'NAME'}
                ]
            });
        });

        function edit(id){
            action = "update";
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/user/roles_edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                    $('#roleModal').modal('show');
                }
            });
        }
        

        function saveRecord() {
            var data = {
                _token: "{{csrf_token()}}",
                name: $('#name').val(),
                action: action,
                id: hold_id
            };
            
            $('.error-message').remove();

            $.post('/user/roles_save', data).done(function(response) {
                clearField();
                toastr.success('Record saved');
                table.clear().draw();
            }).fail(function(response) {
                for (var field in response.responseJSON.errors) {
                    $('#'+field+"_error_message").remove();
                    $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                }
                toastr.error(response.responseJSON.message);
            });
        }
        
        function clearField() {
            hold_id = null;
            action = 'save';
            
            $('#name').val("");
        }
        
        function currency(total) {
            var neg = false;
            if(total < 0) {
                neg = true;
                total = Math.abs(total);
            }
            return (neg ? "-₱ " : '₱ ') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
        }

        
        function confirmDelete(id) {
            hold_id = id;
            action = 'delete';
            $('#confirmModal').modal('show');
        }

        function deleteRecord() {
            $.get('/user/roles_destroy/' + hold_id).done(function(response) {
                $('#confirmModal').modal('hide');
                clearField();
                table.clear().draw();
            });
        }

    </script>
@endsection

@section('styles')
    <style>
        table.dataTable td {
            padding: 3px 10px;
            width: 1px;
            white-space: nowrap;
        }
        thead th {
            white-space: nowrap;
        }
        
        table#penalty_table {
            font-size: 12px;
        }
        td.data-code,
        td.data-transaction-code {
            background: #ccc;
            color: #646464;
            font-size: 12px;
            font-weight: bold;
        }
        td.data-name {
            color: #0b42b1;
            font-size: 12px;
            font-weight: bold;
        }
        table#penalty_table th {
            background: #2e9e5b;
            color: #fff;
        }
        .stats-unpaid {
            color: red;
        }
        .stats-paid {
            color: lime;
        }
        .stats-waived {
            color: orange;
        }
    </style>
@endsection
@stop