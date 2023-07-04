@extends('backend.master.template')

@section('title', 'Users')

@section('breadcrumbs')
    <span><a href="#" style="color:#fff;">Account Management</a></span> / <span class="highlight">Users</span>
@endsection


@section('content')
<div class="main">
<div class="row">
    @include('backend.partial.flash-message')
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>USERS</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#userModal" style="float:right" onclick="clearField()">
                        ADD USER
                    </button>
                </div>
                <div class="card-body">
                    <table id="users_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="form-group col-12 firstname">
                        <label for="name">FIRSTNAME</label>
                        <input type="text" class="form-control" name="firstname" id="firstname"/>
                    </div>
                    <div class="form-group col-12 middlename">
                        <label for="name">MIDDLENAME</label>
                        <input type="text" class="form-control" name="middlename" id="middlename"/>
                    </div>
                    <div class="form-group col-12 lastname">
                        <label for="name">LASTNAME</label>
                        <input type="text" class="form-control" name="lastname" id="lastname"/>
                    </div>
                    <div class="form-group col-12 suffix">
                        <label for="name">SUFFIX</label>
                        <input type="text" class="form-control" name="suffix" id="suffix"/>
                    </div>
                    <div class="form-group col-12 email">
                        <label for="name">EMAIL</label>
                        <input type="email" class="form-control" name="email" id="email"/>
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

<div class="modal fade" id="accessModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERMISSION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="form-group col-12 role_id">
                        <label for="name">ROLES</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value=""></option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary" onclick="giveAccess()">SAVE</button>
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
        var permission = 'save';

        $(function() {
            table = $('#users_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/user/get',
                    type: 'GET'
                },
                columns: [
                    { data: 'lastname', title: 'ACTION', render: function(data, type, row, meta) {
                        var html = "<td>";
                            html += "<a href='#' class='align-middle edit' onclick='edit("+row.id+")' title='EDIT'><i class='align-middle fas fa-fw fa-pen'></i></a>";
                            html += "<a href='#' class='align-middle edit' onclick='confirmDelete("+row.id+")' title='DELETE'><i class='align-middle fas fa-fw fa-trash'></i></a>";
                            html += "<a href='#' class='align-middle access' onclick='access("+row.id+")' title='ACCESS'><i class='align-middle fas fa-fw fa-key'></i></a>";
                            html += "</td>";
                        return html;
                    }},
                    { data: 'firstname', title: 'NAME', class:'data-name', render: function(data, type, row, meta) {
                        return row.firstname + " " + (row.middlename !== ''?row.middlename + ' ':'') + row.lastname + (row.suffix !== ''&&row.suffix !== null?' ' + row.suffx + ' ':'');
                    }},
                    { data: 'email', title: 'EMAIL' }
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
                url: '/user/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                    $('#userModal').modal('show');
                }
            });
        }
        

        function saveRecord() {
            var data = {
                _token: "{{csrf_token()}}",
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                suffix: $('#suffix').val(),
                email: $('#email').val(),
                action: action,
                id: hold_id
            };
            
            $('.error-message').remove();

            $.post('/user/save', data).done(function(response) {
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
            
            $('#firstname').val("");
            $('#middlename').val("");
            $('#lastname').val("");
            $('#suffix').val("");
            $('#email').val("");

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
            $.get('/user/destroy/' + hold_id).done(function(response) {
                $('#confirmModal').modal('hide');
                clearField();
                table.clear().draw();
            });
        }

        function access(id) {
            hold_id = id;
            permission = 'save';
            
            $('.error-message').remove();
            $('#role_id').val("");

            $.get('/user/check_access/'+id, function(response) {
                console.log(response);
                if(response.permission !== null) {
                    $('#role_id').val(response.permission.role.id);
                    permission = 'update';
                }
                $('#accessModal').modal('show');
            });
        }

        function giveAccess() {
            var data = {
                _token: "{{csrf_token()}}",
                role_id: $('#role_id').val(),
                model_id: hold_id,
                model_type: 'App\User',
                action: permission,
                id: hold_id
            };
            
            $('.error-message').remove();

            $.post('/user/give_access', data).done(function(response) {
                toastr.success('Record saved');
                $('#accessModal').modal('hide');
            }).fail(function(response) {
                for (var field in response.responseJSON.errors) {
                    $('#'+field+"_error_message").remove();
                    $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                }
                toastr.error(response.responseJSON.message);
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