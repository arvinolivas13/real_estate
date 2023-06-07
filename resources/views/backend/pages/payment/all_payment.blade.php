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
                        <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#reserveModal" style="float:right">
                            Add Payment
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="customer_record" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Customer Name</th>
                                    <th>Property Code</th>
                                    <th>Payment Date</th>
                                    <th>Payment Type</th>
                                    <th>Payment Classification</th>
                                    <th>Amount</th>
                                    <th>Reference No.</th>
                                    <th>OR No.</th>
                                    <th>Attachment</th>
                                    <th>Remarks</th>
                                    <th>Process By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $payment)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            <a href="#" class="align-middle edit" onclick="edit({{ $payment->id }})" title="Edit" data-toggle="modal" data-target="#customerModal" id={{$payment->id}}><i class="align-middle fas fa-fw fa-pen"></i></a>
                                            <a href="{{url('payment/destroy/' . $payment->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                        </td>
                                        <td>{{$payment->customer->firstname . ' ' . $payment->customer->middlename . ' ' . $payment->customer->lastname}}</td>
                                        <td>{{$payment->code}}</td>
                                        <td>{{$payment->date}}</td>
                                        <td>{{$payment->paymenttype->payment}}</td>
                                        <td>{{$payment->payment_classification}}</td>
                                        <td>₱ {{ number_format($payment->amount, 2) }}</td>
                                        <td>{{$payment->reference_no}}</td>
                                        <td>{{$payment->or_no}}</td>
                                        <td class="text-primary" style="font-weight: bold"><span class="image-viewer-btn" onclick="imageView('{{$payment->code}}', '{{$payment->attachment}}')">{{$payment->attachment}}</span></td>
                                        <td>{{$payment->remarks}}</td>
                                        <td>{{$payment->process_by->firstname . ' ' . $payment->process_by->middlename . ' ' . $payment->process_by->lastname}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-3">
                    <form id="modal-form" action="{{url('payment/save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Customer Name</label>
                            <div class="row col-12">
                                <input type="hidden" id="customer_id" name="customer_id" class="form-control col-10"/>
                                <input type="text" class="form-control col-10 customer_name" placeholder="Select Order" disabled/>
                                <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#customerList"><i class="fas fa-search"></i></button>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="inputPassword4">Property Code<span style="color: red">*</span></label>
                            <select class="form-control" id="code" name="code" required>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Payment Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="inputPassword4">Payment Type<span style="color: red">*</span></label>
                            <select class="form-control" name="payment_id" required>
                                @foreach ($paymenttypes as $paymenttype)
                                    <option value="{{ $paymenttype->id }}">{{ $paymenttype->payment }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="inputPassword4">Payment Classification<span style="color: red">*</span></label>
                            <select class="form-control" name="payment_classification" onchange="classification(this.value)" required>
                                <option selected disabled hidden>Choose here</option>
                                <option value="MA">MONTHLY AMORTIZATION</option>
                                <option value="DP">DOWN PAYMENT</option>
                                <option value="INT">INTEREST</option>
                                <option value="PEN">PENALTY</option>
                                <option value="FULL">FULL PAYMENT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 ma_counter">
                            <label class="inputPassword4">Monthly Amortization<span style="color: red">*</span></label>
                            <select class="form-control" id="counter" name="counter">
                                <option selected disabled hidden>Choose here</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Amount<span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="amount" name="amount" step="0.01" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Reference #</label>
                            <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="Enter Reference #">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">OR #</label>
                            <input type="number" class="form-control" id="or_no" name="or_no" placeholder="Enter OR #">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Attachment</label>
                            <input type="file" class="form-control" id="attachment" name="attachment">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Remarks</label>
                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-button">Pay</button>
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
                                    <td>{{$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname}}</td>
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
        function edit(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/customer/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('#modal-form').attr('action', 'customer/update/' + data.customer.id);
                    $('.modal-title').text('Update Customer');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
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

        function selectCustomer(id, value) {
            $('#customer_id').val(id);
            $('.customer_name').val(value);
            lotNo(id);
            $('#customerList').modal('hide');
        }

        $(function() {
            $('.ma_counter').hide();
            $('#customer_records_tbl').DataTable({
                scrollX: true,
            });

            $('#customer_record').DataTable({
                scrollX: true,
            });
        });

        function imageView(block, output) {
            var blk = block.split(" ");
            $('#ImageView').modal('show');
            $('#ImageView img').attr('src', '/customer_file/' + blk[1] + '/' + output);
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
    </style>
@endsection
@stop