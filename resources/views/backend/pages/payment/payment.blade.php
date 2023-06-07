@extends('backend.master.template')

@section('title', 'Payment')

@section('breadcrumbs')
    <span><a href="#" style="color:#fff;">Home</a></span> / <span class="highlight">Payment</span>
@endsection


@section('content')
<div class="main">
    <div class="row">
        @include('backend.partial.flash-message')
        <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Payment Record</h3>
                        <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#reserveModal" style="float:right" onclick="clearField()">
                            ADD PAYMENT
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="payment_table" class="table table-striped" style="width:100%"></table>
                    </div>
                </div>
        </div>
    </div>

    <div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PAYMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="customer_name">Customer Name</label>
                            <div class="input-group">
                                <input type="hidden" id="customer_id" name="customer_id" class="form-control col-10"/>
                                <input type="text" id="customer_name" class="form-control col-10 customer_name" placeholder="Select Order" disabled/>
                                <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#customerList"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="form-group col-md-6 code">
                            <label for="code">Property Code<span style="color: red">*</span></label>
                            <select class="form-control" id="code" name="code" onchange="identifyDownpayment()" required>
                            </select>
                        </div>
                        <div class="form-group col-md-4 date">
                            <label for="date">Payment Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="form-group col-md-4 payment_id">
                            <label for="payment_id">Payment Type<span style="color: red">*</span></label>
                            <select class="form-control" name="payment_id" id="payment_id" required>
                                @foreach ($paymenttypes as $paymenttype)
                                    <option value="{{ $paymenttype->id }}">{{ $paymenttype->payment }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 payment_classification">
                            <label for="payment_classification">Payment Classification<span style="color: red">*</span></label>
                            <select class="form-control" name="payment_classification" id="payment_classification" onchange="classification(this.value)" required>
                                <option selected disabled hidden>Choose here</option>
                                <option value="MA">MONTHLY AMORTIZATION</option>
                                <option value="DP" class="dp">DOWN PAYMENT</option>
                                <option value="INT">INTEREST</option>
                                <option value="PEN">PENALTY</option>
                                <option value="FULL">FULL PAYMENT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 ma_counter counter">
                            <label for="counter">Monthly Amortization<span style="color: red">*</span></label>
                            <select class="form-control" id="counter" name="counter">
                                <option selected disabled hidden>Choose here</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 amount">
                            <label for="amount">Amount<span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="amount" name="amount" step="0.01" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group col-md-6 reference_no">
                            <label for="reference_no">Reference #</label>
                            <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="Enter Reference #">
                        </div>
                        <div class="form-group col-md-12 or_no">
                            <label for="or_no">OR #</label>
                            <input type="number" class="form-control" id="or_no" name="or_no" placeholder="Enter OR #">
                        </div>
                        <div class="form-group col-md-12 attachment">
                            <label for="attachment">Attachment</label>
                            <input type="file" class="form-control" id="attachment" name="attachment">
                        </div>
                        <div class="form-group col-md-12 remarks">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" placeholder="Enter Remarks"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    <button type="button" class="btn btn-success" onclick="saveRecord()">PAY</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ImageView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-3">
                    <div class="image-viewer">
                        <img src="" alt="" width="100%">
                    </div>
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


    <!-- Customer List Modal -->
    <div class="modal fade" id="customerList" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-3">
                    <table id="customer_records_tbl" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subscriber No</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Birthday</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key => $customer)
                                <tr onclick="selectCustomer({{ $customer->id }}, '{{ $customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname }}')">
                                    <td>{{++$key}}</td>
                                    <td>{{$customer->subscriber_no}}</td>
                                    <td id="name_{{$customer->id}}">{{$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->contact}}</td>
                                    <td>{{$customer->birthday}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            $('.ma_counter').hide();
            $('#customer_records_tbl').DataTable({
                scrollX: true,
            });

            $('#customer_record').DataTable({
                scrollX: true,
            });
            
            table = $('#payment_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/payment/get',
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
                    { data: null, title: 'NAME', class:'data-name', render: function(data, type, row, meta) {
                        return row.customer.firstname + " " + (row.customer.middlename !== ''?row.customer.middlename + ' ':'') + row.customer.lastname;
                    }},
                    { data: 'code', title: 'PROPERTY CODE', class: 'data-code' },
                    { data: 'paymenttype.payment', title: 'PAYMENT TYPE' },
                    { data: 'payment_classification', title: 'AMOUNT' },
                    { data: 'amount', title: 'AMOUNT', render: function(data, type, row, meta) {
                        return currency(row.amount);
                    }},
                    { data: 'reference_no', title: 'REFERENCE NO.' },
                    { data: 'or_no', title: 'OR NO.' },
                    { data: 'attachment', title: 'ATTACHMENT' },
                    { data: 'remarks', title: 'REMARKS' },
                    { data: null, title: 'PROCESS BY', render: function(data, type, row, meta) {
                        return row.process_by.firstname + " " + (row.process_by.middlename !== ''?row.process_by.middlename + ' ':'') + row.process_by.lastname;
                    }},
                ]
            });
        });

        function edit(id){
            action = "update";
            hold_id = id;
            $('.dp').css('display', 'block');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/payment/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    var o = new Option(data.payment.code, data.payment.code);
                    $(o).html(data.payment.code);
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            if(k === 'code') {
                                $("#" + k).html(o);
                            }
                            else {
                                $('#'+k).val(v);
                            }
                        });
                    });
                    $('#customer_name').val(data.payment.customer.firstname + " " + (data.payment.customer.middlename !== ""?data.payment.customer.middlename + " ":'') + data.payment.customer.lastname);
                    identifyDownpayment();
                    $('#reserveModal').modal('show');
                }
            });
        }

        function classification (value) {
            if( value == 'MA') {
                $('.ma_counter').show();
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/payment/amortization/' + $('#code').val() ,
                    method: 'get',
                    success: function(data) {
                        $('#counter').empty();
                        var counter = data.ma_counters;
                        console.log(counter);
                        for (let index = 0; index < counter.length; index++) {
                            $("#counter").append('<option value="' + counter[index].id + '">' + counter[index].payment_classification + ' (' + counter[index].counter +')' + '</option>');
                        }

                    }
                });
            } else {
                $('.ma_counter').hide();
            }
        }

        function lotNo(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/payment/lot/' + id,
                method: 'get',
                success: function(data) {
                    $('#code').empty();
                    console.log(data);
                    var lot = data.lot;
                    for (let index = 0; index < lot.length; index++) {
                        $("#code").append(new Option(lot[index].code, lot[index].code));
                    }

                }
            });
        }

        function identifyDownpayment() {
            var id = $('#customer_id').val();
            var code = $('#code').val();

            $.post('/payment/getWithDownpayment', { _token: "{{csrf_token()}}", id: id, code: code }).done(function(response) {
                if(response.length !== 0) {
                    $('.dp').css('display', 'none');
                }
            });
        }

        function selectCustomer(id, value) {
            $('#customer_id').val(id);
            $('.customer_name').val(value);
            lotNo(id);
            $('#customerList').modal('hide');
        }


        function imageView(block, output) {
            var blk = block.split(" ");
            $('#ImageView').modal('show');
            $('#ImageView img').attr('src', '/customer_file/' + blk[1] + '/' + output);
        }
        
        function currency(total) {
            var neg = false;
            if(total < 0) {
                neg = true;
                total = Math.abs(total);
            }
            return (neg ? "-₱ " : '₱ ') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
        }

        function saveRecord() {
            var data = {
                _token: "{{csrf_token()}}",
                customer_id: $('#customer_id').val(),
                code: $('#code').val(),
                date: $('#date').val(),
                payment_id: $('#payment_id').val(),
                payment_classification: $('#payment_classification').val(),
                amount: $('#amount').val(),
                reference_no: $('#reference_no').val(),
                or_no: $('#or_no').val(),
                attachment: $('#attachment').val(),
                remarks: $('#remarks').val(),
                action: action,
                id: hold_id
            };

            $('.error-message').remove();
            
            $.post('/payment/save', data).done(function(response) {
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
        
        function confirmDelete(id) {
            hold_id = id;
            action = 'delete';
            $('#confirmModal').modal('show');
        }

        function deleteRecord() {
            $.get('/payment/destroy/' + hold_id).done(function(response) {
                $('#confirmModal').modal('hide');
                clearField();
                table.clear().draw();
            });
        }

        function clearField() {
            hold_id = null;
            action = 'save';
            $('.dp').css('display', 'block');
            
            $('#customer_id').val("");
            $('#customer_name').val("");
            $('#code option').remove();
            $('#date').val("");
            $('#payment_type').val("1");
            $('#payment_classification').val("");
            $('#amount').val("");
            $('#reference_no').val("");
            $('#or_no').val("");
            $('#attachment').val("");
            $('#remarks').val("");
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
        
        table#payment_table {
            font-size: 12px;
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
        table#payment_table th {
            background: #2e9e5b;
            color: #fff;
        }
    </style>
@endsection
@stop
