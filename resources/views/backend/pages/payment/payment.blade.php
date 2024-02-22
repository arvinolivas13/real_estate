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
                        <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#reserveModal" style="float:right;" onclick="clearField()">
                            ADD PAYMENT
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
                                    <label for="lastname">TRANSACTION CODE:</label>
                                    <input type="text" class="form-control form-control-sm" name="f_code" id="f_code"/>
                                </div>
                                <div class="form-group col-4">
                                    <label for="lastname">PAYMENT TYPE:</label>
                                    <select name="f_payment_type" id="f_payment_type" class="form-control form-control-sm">
                                        <option></option>
                                        @foreach ($paymenttypes as $paymenttype)
                                            <option value="{{ $paymenttype->id }}">{{ $paymenttype->payment }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="lastname">PAYMENT CLASSIFICATION:</label>
                                    <select name="f_payment_classification" id="f_payment_classification" class="form-control form-control-sm">
                                        <option></option>
                                        <option value="MA">MONTHLY AMORTIZATION</option>
                                        <option value="DP">DOWN PAYMENT</option>
                                        <option value="INT">INTEREST</option>
                                        <option value="PEN">PENALTY</option>
                                        <option value="FULL">FULL PAYMENT</option>
                                        <option value="RES">RESERVATION</option>
                                    </select>
                                </div>
                                <div class="col-12 text-right">
                                    <button class="btn btn-light" onclick="clearFilter()">Clear</button>
                                    <button class="btn btn-primary" onclick="filter()">Generate</button>
                                </div>
                            </div>
                        </div>
                        <br>
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
                    <form id="paymentForm" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
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
                                    <option value="RES">RESERVATION</option>
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
                                {{-- <input type="file" class="form-control" id="attachment" name="attachment"> --}}
                                <input type="file" name="attach_file[]" id="attach_file" class="form-control" accept="image/*,.pdf" multiple/>
                            </div>
                            <div class="form-group col-md-12 remarks">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" placeholder="Enter Remarks"></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                            <button type="submit" class="btn btn-success">SAVE</button>
                        </div>
                    </form>
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

    <div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title block-details-title">ATTACHMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="attachment-container">
                                <div class="attachment-item row"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<div class="modal fade" id="imageView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block-details-title">VIEWER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentForm" method="POST"  action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <img id="image_view" src="" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fileView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block-details-title">VIEWER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentForm" method="POST"  action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <object id="file_view" data="" type="application/pdf" width="100%" height="500px"></object>
                        </div>
                    </div>
                </form>
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
        var type = "payment";

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
                scrollX: true,
                ajax: {
                    url: '/payment/get',
                    type: 'GET'
                },
                columns: [
                    { data: 'customer.lastname', title: 'ACTION', render: function(data, type, row, meta) {
                        var html = "<td>";
                            html += "<a href='#' class='align-middle edit' onclick='edit("+row.id+")' title='EDIT'><i class='align-middle fas fa-fw fa-pen'></i></a>";
                            html += "<a href='#' class='align-middle edit' onclick='confirmDelete("+row.id+")' title='DELETE'><i class='align-middle fas fa-fw fa-trash'></i></a>";
                            html += "</td>";
                        return html;
                    }},
                    { data: 'customer.firstname', title: 'NAME', class:'data-name', render: function(data, type, row, meta) {
                        return row.customer.firstname + " " + (row.customer.middlename !== ''&&row.customer.middlename !== null?row.customer.middlename + ' ':'') + row.customer.lastname;
                    }},
                    { data: 'code', title: 'PROPERTY CODE', class: 'data-code' },
                    { data: 'paymenttype.payment', title: 'PAYMENT TYPE' },
                    { data: 'payment_classification', title: 'PAYMENT CLASSIFICATION', render: function(data, type, row, meta) {
                        if (row.payment_classification != 'MA') {
                            return row.payment_classification;
                        } else {
                            return  row.payment_classification + ' (' + row.amortization.counter + ')';
                        }
                    }},
                    { data: 'amount', title: 'AMOUNT', render: function(data, type, row, meta) {
                        return currency(row.amount);
                    }},
                    { data: 'reference_no', title: 'REFERENCE NO.' },
                    { data: 'or_no', title: 'OR NO.' },
                    { data: 'date', title: 'PAYMENT DATE', render: function(data, type, row, meta) {
                        return moment(row.date).format('MMM DD YYYY');
                    }},
                    { data: 'remarks', title: 'REMARKS' },
                    { data: 'attachment', title: 'ATTACHMENT', render: function(data, type, row, meta) {
                        return '<a href="#" onclick="viewAttachment('+row.id+')">' +row.attachment.length + ' File/s</a>';
                    }},
                    { data: 'customer.middlename', title: 'PROCESS BY', render: function(data, type, row, meta) {
                        return row.process_by.firstname + " " + (row.process_by.middlename !== ''&&row.process_by.middlename !== null?row.process_by.middlename + ' ':'') + row.process_by.lastname;
                    }},
                ]
            });

            $('#paymentForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                let TotalFiles = $('#attach_file')[0].files.length; //Total files
                let files = $('#attach_file')[0];

                for (let i = 0; i < TotalFiles; i++) {
                    formData.append('files' + i, files.files[i]);
                }

                formData.append('TotalFiles', TotalFiles);
                formData.append('lot_id', $('#code').val().split('-')[2]);
                formData.append('type', type);
                formData.append('action', action);
                formData.append('id', hold_id);

                $.ajax({
                    type:'POST',
                    url: "/payment/save",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                        this.reset();
                        $('#addAttachment').modal('hide');
                        clearField();
                        table.clear().draw();
                        // getAttachmentItem();
                    },
                    error: function(data){
                        alert(data.responseJSON.errors.files[0]);
                    }
                });
                
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
                            else if(k === 'payment_classification') {
                                classification_2(v);
                                $('#'+k).val(v);
                            }
                            else {
                                $('#'+k).val(v);
                                if(k === 'amortization') {
                                    if(v !== null) {
                                        setTimeout(() => {
                                            $('#counter').val(data.payment.amortization.counter);
                                        }, 1000);
                                        // console.log(data.payment.amortization.counter);
                                    }
                                }
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
                        console.log('TEST');
                        console.log(counter);
                        for (let index = 0; index < counter.length; index++) {
                            $("#counter").append('<option value="' + counter[index].counter + '">' + counter[index].payment_classification + ' (' + counter[index].counter +')' + '</option>');
                        }

                    }
                });
            } else {
                $('.ma_counter').hide();
            }
        }

        function classification_2(value) {
            if( value == 'MA') {
                $('.ma_counter').show();
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/payment/amortization_2/' + $('#code').val() ,
                    method: 'get',
                    success: function(data) {
                        $('#counter').empty();
                        var counter = data.ma_counters;
                        console.log(counter);
                        for (let index = 0; index < counter.length; index++) {
                            $("#counter").append('<option value="' + counter[index].counter + '">' + counter[index].payment_classification + ' (' + counter[index].counter +')' + '</option>');
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
                counter: $('#counter').val(),
                payment_classification: $('#payment_classification').val(),
                amount: $('#amount').val(),
                counter: $('#counter').val(),
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
            $('.ma_counter').css("display", 'none');
            $('#counter option').remove();
        }

        function filter() {
            var data = { 
                _token: "{{csrf_token()}}",
                firstname: $('#firstname').val()
            };

            if ($.fn.DataTable.isDataTable('#payment_table')) {
                $('#payment_table').DataTable().clear().destroy();
            }

            table = $('#payment_table').DataTable({
                    responsive: true,
                    processing: true,
                    ordering: false,
                    serverSide: true,
                    scrollX: true,
                    pageLength: 20,
                    ajax: {
                        url: '/payment/filter',
                        type: 'POST',
                        data: {
                            '_token': "{{csrf_token()}}",
                            'firstname': $('#f_firstname').val(),
                            'middlename': $('#f_middlename').val(),
                            'lastname': $('#f_lastname').val(),
                            'code': $('#f_code').val(),
                            'payment_type': $('#f_payment_type').val(),
                            'payment_classification': $('#f_payment_classification').val()
                        }
                    },
                    columns: [
                        { data: 'customer.lastname', title: 'ACTION', render: function(data, type, row, meta) {
                            var html = "<td>";
                                html += "<a href='#' class='align-middle edit' onclick='edit("+row.id+")' title='EDIT'><i class='align-middle fas fa-fw fa-pen'></i></a>";
                                html += "<a href='#' class='align-middle edit' onclick='confirmDelete("+row.id+")' title='DELETE'><i class='align-middle fas fa-fw fa-trash'></i></a>";
                                html += "</td>";
                            return html;
                        }},
                        { data: 'customer.firstname', title: 'NAME', class:'data-name', render: function(data, type, row, meta) {
                            return row.customer.firstname + " " + (row.customer.middlename !== ''&&row.customer.middlename !== null?row.customer.middlename + ' ':'') + row.customer.lastname;
                        }},
                        { data: 'code', title: 'PROPERTY CODE', class: 'data-code' },
                        { data: 'paymenttype.payment', title: 'PAYMENT TYPE' },
                        { data: 'payment_classification', title: 'PAYMENT CLASSIFICATION', render: function(data, type, row, meta) {
                        if (row.payment_classification != 'MA') {
                                return row.payment_classification;
                            } else {
                                return  row.payment_classification + ' (' + row.amortization.counter + ')';
                            }
                        }},
                        { data: 'amount', title: 'AMOUNT', render: function(data, type, row, meta) {
                            return currency(row.amount);
                        }},
                        { data: 'reference_no', title: 'REFERENCE NO.' },
                        { data: 'or_no', title: 'OR NO.' },
                        { data: 'date', title: 'PAYMENT DATE', render: function(data, type, row, meta) {
                            return moment(row.date).format('MMM DD YYYY');
                        }},
                        { data: 'remarks', title: 'REMARKS' },
                        { data: 'attachment', title: 'ATTACHMENT', render: function(data, type, row, meta) {
                            return '<a href="#" onclick="viewAttachment('+row.id+')">' + (row.attachment!==null?row.attachment.length:0) + ' File/s</a>';
                        }},
                        { data: 'customer.middlename', title: 'PROCESS BY', render: function(data, type, row, meta) {
                            return row.process_by.firstname + " " + (row.process_by.middlename !== ''&&row.process_by.middlename !== null?row.process_by.middlename + ' ':'') + row.process_by.lastname;
                        }},
                    ]
                });
        }

        function clearFilter() {
            $('#f_firstname').val('');
            $('#f_middlename').val('');
            $('#f_lastname').val('');
            $('#f_code').val('');
            $('#f_payment_type').val('');
            $('#f_payment_classification').val('');
            table.clear().draw();
            filter();
        }

        function showFilter() {
            if($('.hide').length === 0) {
                $('.filter-body').addClass('hide');
            }
            else {
                $('.filter-body').removeClass('hide');
            }
        }

        function viewAttachment(id) {
            event.preventDefault();
            var html = '';
            $.get('/payment/get_attachment/' + id, function(response) {
                console.log(response);
                $.each(response.attachment, (i, v) => {
                    var ext = v.file_name.split('.');
                    if(ext[1] === "pdf") {
                        html += "<div class='file-item col-3'><span class='remove-img' onclick='removeFile("+v.id+", \"/storage/" + v.file_name.replace('public/','') + "\")'><i class='fas fa-trash'></i></span><div onclick='fileView("+'"/storage/'+v.file_name.replace('public/','')+'"'+")'><div class='file-img' style='background:url(/images/pdf.png)'></div><div class='file-name'>"+v.type+"_"+i+"</div></div></div>";
                    }
                    else {
                        html += "<div class='file-item col-3'><span class='remove-img' onclick='removeFile("+v.id+", \"/storage/" + v.file_name.replace('public/','')+ "\")'><i class='fas fa-trash'></i></span><div onclick='imageView("+'"/storage/'+v.file_name.replace('public/','')+'"'+")'><div class='file-img' style='background:url(/storage/" + v.file_name.replace('public/','') + ")'></div><div class='file-name'>"+v.type+"_"+i+"</div></div></div>";
                    }
                });
                $('.attachment-item').html(html);
                $('#attachmentModal').modal('show');
            });
        }
        
        function fileView(file) {
            $('#file_view').attr('data', file);
            $('#fileView').modal('show');
        }

        function imageView(image) {
            $('#image_view').attr('src', image);

            $('#imageView').modal('show');
        }

        function removeFile(id, file) {
            $.post('/attachment/destroy', { _token: "{{csrf_token()}}", id: id, file: file }).done(function(response) {
                getAttachmentItem();
            });
        }

    </script>
@endsection

@section('styles')
    <style>
        .filter-body.hide {
            display: none !important;
        }
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
        
        span.remove-img {
            float: right;
            background: #a50a0a;
            padding: 5px 8px;
            font-size: 12px;
            color: #fff;
            border-radius: 5px;
            opacity: 0.7 !important;
            cursor: pointer;
        }
        object#file_view {
            height: 800px;
        }
        .file-item>div {
            padding: 10px;
            cursor: pointer;
        }
        .file-item>div:hover {
            background: #ccc;
        }
        .list-item.active {
            background: #2e9e5b !important;
            color: #fff !important;
        }
        img#image_view {
            width: 100%;
        }
        .file-name {
            font-weight: bold;
            color: blue;
            text-align: center;
            text-transform: uppercase;
        }
        .file-img {
            height: 124px;
            background-size: cover !important;
            background-position: center center !important;
            cursor: pointer;
        }

        .attachment-item {
            margin: 10px 0px;
        }

        div#addAttachment,
        #imageView,
        #fileView {
            background: rgba(0, 0, 0, 0.5);
        }
        .attachment-container {
            padding: 15px;
        }
        .list-item:hover {
            background: #d5d5d5 !important;
        }
        ul.attachment-list {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }
        ul.attachment-list .list-item {
            padding: 10px;
            background: #eee;
            margin-bottom: 5px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
        }
        .attachment-container {
            height: 450px;
            background: #eee;
        }
        .attachment-option {
            padding: 13px;
            background: #fdf2ca;
            margin-bottom: 10px;
        }
    </style>
@endsection
@stop
