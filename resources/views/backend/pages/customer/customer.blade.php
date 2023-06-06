@extends('backend.master.template')

@section('title', 'Customers')

@section('breadcrumbs')
    <span><a href="#" style="color:#fff;">Home</a></span> / <span class="highlight">Customers</span>
@endsection


@section('content')
<div class="main">
<div class="row">
    @include('backend.partial.flash-message')
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Customer Information</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#customerModal" style="float:right" onclick="clearField()">
                        ADD CUSTOMER
                    </button>
                </div>
                <div class="card-body">
                    <table id="customer_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
    </div>
</div>

@include('backend.partial.component.attachment')
{{-- MODAL --}}
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CUSTOMER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="form-group col-md-12 subscriber_no">
                        <label for="inputPassword4">Customer Code <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="subscriber_no" name="subscriber_no" placeholder="Enter Customer Code" required>
                    </div>
                    <div class="form-group col-md-4 firstname">
                        <label for="inputPassword4">First Name <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group col-md-4 middlename">
                        <label for="inputPassword4">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle Name">
                    </div>
                    <div class="form-group col-md-4 lastname">
                        <label for="inputPassword4">Last Name <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
                    </div>
    
                    <div class="form-group col-md-6 email">
                        <label for="inputPassword4">Email <span style="color: red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    </div>

                    <div class="form-group col-md-6 contact">
                        <label for="inputPassword4">Contact <span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact" required>
                    </div>
    
                    <div class="form-group col-md-12 address">
                        <label for="inputPassword4">Address <span style="color: red">*</span></label>
                        <textarea name="address" id="address" class="form-control" placeholder="Enter Address" required></textarea>
                    </div>
    
                    <div class="form-group col-md-6 birthday">
                        <label for="inputPassword4">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>

                    <div class="form-group col-md-6 gender">
                        <label class="inputPassword4">Gender <span style="color: red">*</span></label>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
    
                    <div class="form-group col-md-12 occupation">
                        <label for="inputPassword4">Occupation</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation">
                    </div>
    
                    <div class="form-group col-md-12 status">
                        <label class="inputPassword4">Status <span style="color: red">*</span></label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="INACTIVE">INACTIVE</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary submit-button" onclick="saveRecord()">SAVE</button>
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
        var action = 'save';
        var hold_id = null;

        function edit(id){
            action = 'update';
            hold_id = id;
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/customer/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    console.log(data.customer.id);
                    $('#customerModal').modal('show');
                    
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                }
            });
        }

        function uploadAttachment(id) {
            $('#customer_id').val(id)
        }

        function attachment(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/attachment/show/' + id,
                method: 'get',
                success: function(data) {
                    $('#attachment-pdf-list, #attachment-image-list').empty();
                    var record = data.attachments;
                    for (let index = 0; index < record.length; index++) {
                        var path = '/attachment/requirement/' + record[index].id + '/' + record[index].attachment + "'" + ',' + "'" +  record[index].type;
                        $('#attachment-pdf-list').append('<a href="#" onclick="viewAttachment('+"'"+path+"'"+')">' + record[index].code + '</a>')
                        console.log(record[index].attachment);
                    }
                }
            });
        }

        function viewAttachment(file, type) {
            if(type === "jpg") {
                $('.no_attachment').css('display','none');
                $('#pdf_attachment').css('display','none');
                $('#image_attachment').attr('src',file);
                $('#image_attachment').css('display','block');
            }
            else {
                $('.no_attachment').css('display','none');
                $('#image_attachment').css('display','none');
                $('#pdf_attachment').attr('src',file);
                $('#pdf_attachment').css('display','block');
            }
        }

        function saveRecord() {
            var data = {
                _token: '{{csrf_token()}}',
                subscriber_no: $('#subscriber_no').val(),
                firstname: $('#firstname').val(),
                middlename: $('#middlename').val(),
                lastname: $('#lastname').val(),
                email: $('#email').val(),
                address: $('#address').val(),
                contact: $('#contact').val(),
                birthday: $('#birthday').val(),
                gender: $('#gender').val(),
                occupation: $('#occupation').val(),
                status: $('#status').val(),
                action: action,
                id: hold_id
            };

            $('.error-message').remove();

            $.post('/customer/save', data).done(function(response){
                clearField();
                // $('#customerModal').modal('hide');
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
            
            $('#subscriber_no').val("");
            $('#firstname').val("");
            $('#middlename').val("");
            $('#lastname').val("");
            $('#email').val("");
            $('#contact').val("");
            $('#address').val("");
            $('#birthday').val("");
            $('#gender').val("MALE");
            $('#occupation').val("");
            $('#status').val("ACTIVE");
        }

        function confirmDelete(id) {
            hold_id = id;
            action = 'delete';
            $('#confirmModal').modal('show');
        }

        function deleteRecord() {
            $.get('/customer/destroy/' + hold_id).done(function(response) {
                $('#confirmModal').modal('hide');
                clearField();
                table.clear().draw();
            });
        }

        $(function() {
            
            table = $('#customer_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/customer/get',
                    type: 'GET'
                },
                columns: [
                    { data: null, title: '', render: function(data, type, row, meta) {
                        return "<i class='fas fa-circle stats-" + row.status + "' title='"+row.status+"'></i>";
                    }},
                    { data: null, title: 'ACTION', render: function(data, type, row, meta) {
                        var html = "<td>";
                            html += "<a href='#' class='align-middle edit' onclick='edit("+row.id+")' title='EDIT'><i class='align-middle fas fa-fw fa-pen'></i></a>";
                            html += "<a href='#' class='align-middle edit' onclick='confirmDelete("+row.id+")' title='DELETE'><i class='align-middle fas fa-fw fa-trash'></i></a>";
                            html += "<a href='#' class='align-middle edit' onclick='attachment("+row.id+")' title='ATTACHMENT'><i class='align-middle fas fa-fw fa-paperclip'></i></a>";
                            html += "</td>";
                        return html;
                    }},
                    { data: 'subscriber_no', title: 'CODE', class: 'data-code'},
                    { data: null, title: 'NAME', class:'data-name', render: function(data, type, row, meta) {
                        return row.firstname + " " + (row.middlename !== ''?row.middlename + ' ':'') + row.lastname;
                    }},
                    { data: 'email', title: 'EMAIL'},
                    { data: 'address', title: 'ADDRESS'},
                    { data: 'contact', title: 'CONTACT NO.'},
                    { data: 'birthday', title: 'BIRTHDAY', render: function(data, type, row, meta) {
                        return moment(row.birthday).format('MMM DD, YYYY');
                    }},
                    { data: 'occupation', title: 'OCCUPATION'},
                    { data: 'gender', title: 'GENDER'},
                ]
            });
        });

    </script>
@endsection

@section('styles')
    <style>
        table.dataTable td {
            padding: 3px 10px;
            width: 1px;
            white-space: nowrap;
        }
        .stats-ACTIVE {
            color: #31f331 !important;
        }
        .stats-INACTIVE {
            color: red !important;
        }
        thead th {
            white-space: nowrap;
        }
        table#customer_table {
            font-size: 12px;
        }

        .modal-header h5 {
            color: #fff;
            margin: 0px;
        }

        iframe#pdf_attachment {
            width: 100%;
            height: 100%;
        }

        .list-item ul {
            padding: 0px;
            list-style: none;
            margin: 0px;
        }

        .attachment-content {
            height: 100%;
        }

        .list-item li a {
            padding: 10px;
            display: block;
            margin-bottom: 2px;
            background: #eee;
            color: #2e759e;
            font-family: system-ui;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none !important;
        }

        img#image_attachment {
            width: 100%;
        }

        .no_attachment {
            padding: 10px;
            background: #eee;
            text-align: center;
        }
        td.data-code {
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
        table#customer_table th {
            background: #2e9e5b;
            color: #fff;
        }
    </style>
@endsection
@stop
