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
                    <h3>PENALTY</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#penaltyModal" style="float:right" onclick="clearField()">
                        ADD PENALTY
                    </button>
                    <button type="button" class="btn btn-light" onclick="showFilter()" style="float:right; margin-right:5px;">
                        FILTER
                    </button>
                </div>
                <div class="card-body">
                    <div class="filter-body hide">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="firstname">FIRSTNAME:</label>
                                <input type="text" class="form-control form-control-sm" name="f_firstname" id="f_firstname"/>
                            </div>
                            <div class="form-group col-4">
                                <label for="middlename">MIDDLENAME:</label>
                                <input type="text" class="form-control form-control-sm" name="f_middlename" id="f_middlename"/>
                            </div>
                            <div class="form-group col-4">
                                <label for="lastname">LASTNAME:</label>
                                <input type="text" class="form-control form-control-sm" name="f_lastname" id="f_lastname"/>
                            </div>
                            <div class="form-group col-4">
                                <label for="lastname">CODE:</label>
                                <input type="text" class="form-control form-control-sm" name="f_code" id="f_code"/>
                            </div>
                            <div class="form-group col-4">
                                <label for="lastname">AMMORTIZATION DATE:</label>
                                <input type="date" class="form-control form-control-sm" name="f_ammortization_date" id="f_ammortization_date">
                            </div>
                            <div class="form-group col-4">
                                <label for="lastname">PENALTY DATE:</label>
                                <input type="date" class="form-control form-control-sm" name="f_penalty_date" id="f_penalty_date">
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-light" onclick="clearFilter()">Clear</button>
                                <button class="btn btn-primary" onclick="filter()">Generate</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table id="penalty_table" class="table table-striped" style="width:100%"></table>
                </div>
            </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="penaltyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PENALTY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="customer_name">CUSTOMER</label>
                        <div class="input-group">
                            <input type="hidden" id="customer_id" name="customer_id" class="form-control col-10"/>
                            <input type="text" id="customer_name" class="form-control col-10 customer_name" placeholder="SELECT CUSTOMER" disabled/>
                            <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#customerList"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-group col-6 transaction_id">
                        <label for="transaction_id">TRANSACTION</label>
                        <select name="transaction_id" id="transaction_id" class="form-control" onchange="getAmortization()">
                            <option value="">SELECT TRANSACTION</option>
                        </select>
                    </div>
                    <div class="form-group col-6 monthly_amortization_id">
                        <label for="monthly_amortization_id">MONTHLY AMORTIZATION</label>
                        <select name="monthly_amortization_id" id="monthly_amortization_id" class="form-control">
                            <option value="">SELECT MONTHLY AMORTIZATION</option>
                        </select>
                    </div>
                    <div class="form-group col-6 penalty_date">
                        <label for="penalty_date">PENALTY DATE</label>
                        <input type="date" class="form-control" name="penalty_date" id="penalty_date"/>
                    </div>
                    <div class="form-group col-6 payment_classification">
                        <label for="payment_classification">PAYMENT CLASSIFICATION</label>
                        <select name="payment_classification" id="payment_classification" class="form-control">
                            <option value="MA">MONTHLY AMORTIZATION</option>
                        </select>
                    </div>
                    <div class="form-group col-6 amount">
                        <label for="amount">AMOUNT</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="0"/>
                    </div>
                    <div class="form-group col-6 status">
                        <label for="status">STATUS</label>
                        <select name="status" id="status" class="form-control">
                            <option value="unpaid">UNPAID</option>
                            <option value="paid">PAID</option>
                            <option value="waived">WAIVED</option>
                        </select>
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

<div class="modal fade" id="customerList" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>CUSTOMERS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <table id="customer_records_tbl" class="table table-striped" style="width:100%">
                    <thead>
                        <th>#</th>
                        <th>Subscriber No</th>
                        <th>Customer Name</th>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $customer)
                            <tr onclick="selectCustomer({{ $customer->id }}, '{{ $customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname }}')">
                                <td>{{++$key}}</td>
                                <td>{{$customer->subscriber_no}}</td>
                                <td id="name_{{$customer->id}}">{{$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
            $('#customer_records_tbl').DataTable({});
            
            table = $('#penalty_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/penalty/get',
                    type: 'GET'
                },
                columns: [
                    { data: 'transaction.customer.lastname', title: '', render: function(data, type, row, meta) {
                        return "<i class='fas fa-circle stats-" + row.status + "' title='"+row.status+"'></i>";
                    }},
                    { data: 'transaction.customer.middlename', title: 'ACTION', render: function(data, type, row, meta) {
                        var html = "<td>";
                            html += "<a href='#' class='align-middle edit' onclick='edit("+row.id+")' title='EDIT'><i class='align-middle fas fa-fw fa-pen'></i></a>";
                            html += "<a href='#' class='align-middle edit' onclick='confirmDelete("+row.id+")' title='DELETE'><i class='align-middle fas fa-fw fa-trash'></i></a>";
                            html += "</td>";
                        return html;
                    }},
                    { data: 'transaction.customer.subscriber_no', title: 'CODE', class: 'data-code'},
                    { data: 'transaction.customer.firstname', title: 'NAME', class:'data-name', render: function(data, type, row, meta) {
                        return row.transaction.customer.firstname + " " + (row.transaction.customer.middlename !== ''&&row.transaction.customer.middlename !== null?row.transaction.customer.middlename + ' ':'') + row.transaction.customer.lastname;
                    }},
                    { data: 'transaction.code', title: 'TRANSACTION CODE', class: 'data-transaction-code'},
                    { data: 'amortization.payment_date', title: 'AMORTIZATION DATE', render: function(data, type, row, meta) {
                        return moment(row.amortization.payment_date).format('MMM DD, YYYY');
                    }},
                    { data: 'penalty_date', title: 'PENALTY DATE', render: function(data, type, row, meta) {
                        return moment(row.penalty_date).format('MMM DD, YYYY');
                    }},
                    { data: 'amount', title: 'AMOUNT', render: function(data, type, row, meta) {
                        return currency(row.amount);
                    }},
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
                url: '/penalty/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('#penaltyModal').modal('show');
                    $.each(data, function() {
                        $('#customer_id').val(data.penalty.transaction.customer_id);
                        $('#customer_name').val(data.penalty.transaction.customer.firstname + " " + (data.penalty.transaction.customer.middlename !== ""?data.penalty.transaction.customer.middlename + " ":"") + data.penalty.transaction.customer.lastname);
                        $('#transaction_id').html("<option value='"+data.penalty.transaction_id+"'>"+data.penalty.transaction.code+"</option>");
                        $('#transaction_id').prop("disabled", true);
                        $('#monthly_amortization_id').prop("disabled", true);
                        $('#monthly_amortization_id').html("<option value='"+data.penalty.monthly_amortization_id+"'>"+data.penalty.amortization.payment_classification+"("+data.penalty.amortization.counter+") "+data.penalty.amortization.payment_date+"</option>");
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                }
            });
        }
        
        function selectCustomer(id, value) {
            $('#customer_id').val(id);
            $('.customer_name').val(value);
            $('#customerList').modal('hide');
            $.get('/penalty/get_transaction/' + id, function(response) {
                var html = '';
                    html += "<option value=''>SELECT TRANSACTION</option>";
                $.each(response.transaction, (i, val)=>{
                    html += "<option value='"+val.id+"'>"+val.code+"</option>";
                });
                $('#transaction_id').html(html);
            });
        }

        function getAmortization() {
            var id = $('#transaction_id').val();
            
            $.get('/penalty/get_amortization/' + id, function(response) {
                var html = '';
                    html += "<option value=''>SELECT MONTHLY AMORTIZATION</option>";
                $.each(response.amortization, (i, val)=>{
                    html += "<option value='"+val.id+"'>"+val.payment_classification+"("+val.counter+") " + val.payment_date + "</option>";
                });
                $('#monthly_amortization_id').html(html);
            });
        }

        function saveRecord() {
            var data = {
                _token: "{{csrf_token()}}",
                monthly_amortization_id: $('#monthly_amortization_id').val(),
                transaction_id: $('#transaction_id').val(),
                penalty_date: $('#penalty_date').val(),
                payment_classification: $('#payment_classification').val(),
                amount: $('#amount').val(),
                status: $('#status').val(),
                action: action,
                id: hold_id
            };
            
            $('.error-message').remove();

            $.post('/penalty/save', data).done(function(response) {
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
            
            $('#customer_id').val("");
            $('#customer_name').val("");
            $('#transaction_id').html('<option value="">SELECT TRANSACTION</option>');
            $('#monthly_amortization_id').html('<option value="">SELECT MONTHLY AMORTIZATION</option>');
            $('#penalty_date').val("");
            $('#payment_type').val("1");
            $('#amount').val("0");
            $('#status').val("unpaid");
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
            $.get('/penalty/destroy/' + hold_id).done(function(response) {
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