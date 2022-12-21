@extends('backend.master.template')

@section('title', 'Area Details')

@section('breadcrumbs')
    <span><a href="{{url('area')}}" style="color:#fff;">Area</a></span> / <span class="highlight">Area Details</span>
@endsection


@section('content')
<div class="main">
<div class="row">
    @include('backend.partial.flash-message')
    <input type="text" class="form-control" id="area_code" name="area_code" value="{{$area->code}}" hidden>
    <input type="text" class="form-control" id="area_name" name="area_name" value="{{$area->name}}" hidden>

    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success add-block" data-toggle="modal" data-target="#blockModal" style="float:right">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="legend">
                        <div><span class="square Open"></span> <span class="square-details">Open Lot</span></div>
                        <div><span class="square Active"></span> <span class="square-details">Active Lot</span></div>
                        <div><span class="square Inactive"></span> <span class="square-details">Inactive Lot</span></div>
                        <div><span class="square Reserved"></span> <span class="square-details">Reserved Lot</span></div>
                        <div><span class="square Fullypaid"></span> <span class="square-details">Fully Paid</span></div>
                        <div><span class="square Turnover"></span> <span class="square-details">Turn Over</span></div>
                    </div>
                    <div id="myBtnContainer">
                        <button class="block_btn btn active" onclick="filterSelection('all')">All</button>
                        @foreach ($blocks as $block)
                            <button class="block_btn btn" onclick="filterSelection('{{'block-' . $block->block}}')">{{$block->block}}</button>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        @foreach ($blocks as $block)
                            <div class="filterDiv {{'block-' . $block->block}} col-12">
                                <div class="text-center">
                                    <div class="action-item">
                                        <button class="btn" onclick="removeLot({{$block->id}})">
                                            <i class="align-middle fas fa-fw fa-times" style="color: black"></i> Reduce Lot
                                        </button>
                                    </div>
                                    <h4> {{'BLOCK-' . $block->block}} ({{App\AreaDetailLot::where('block_id', $block->id)->where('status', '!=', 'Open')->count() . '/' .App\AreaDetailLot::where('block_id', $block->id)->count()}}) </h4>
                                        <div class="row">
                                            @foreach ($block->lot as $item)
                                                <div class="col-2">
                                                <div class="lot {{$item->status}}">
                                                    <span class="lot-name">LOT {{$item->lot}}
                                                        <button class="btn btn-sm btn-block edit-lot" onclick="editLot('{{$item->status}}', '{{$item->id}}', '{{$block->block}}', '{{$item->lot}}')"><i class="fas fa-pen"></i></button>
                                                    </span>
                                                    <div class="row lot-details" style="cursor: pointer" onclick="LotFunction('{{$item->status}}', '{{$item->id}}', '{{$block->block}}', '{{$item->lot}}')">
                                                        <div class="col-12">
                                                            @if($item->status === 'OPEN')
                                                            <span class="name-open">OPEN LOT</span>
                                                            @else
                                                            <span class="name-open">----</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-6">
                                                            Area: {{$item->area}} SQM <br>
                                                            TCP: ₱ {{ number_format($item->tcp, 2) }} <br>
                                                        </div>
                                                        <div class="col-6">
                                                            P/SQM: {{ number_format($item->psqm, 2) }}/SQM<br>
                                                            MA: ₱ {{ number_format($item->monthly_amortization, 2) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
</div>


{{-- MODAL --}}
<div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block-details-title">Add Block</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form id="modal-form-block" action="{{url('area_detail/save')}}" method="post">
                @csrf
                <div class="form-group col-md-12 customize-div">
                    <label for="inputPassword4">Block # <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="area_id" name="area_id" value="{{$area_id}}" required hidden>
                    <input type="text" class="form-control" id="block" name="block" placeholder="Enter Block No" required>
                </div>
                <div class="form-group col-md-12 customize-div">
                    <label for="inputPassword4">Lot Quantity<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="lot" name="lot" placeholder="Enter Lot Quantity" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Area<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="area" name="area" placeholder="Enter Lot Area" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">P/SQM<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="psqm" name="psqm" placeholder="Enter P/SQM" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">TCP<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="tcp" name="tcp" placeholder="Enter TCP" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Reservation %<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="reservation_percent" name="reservation_percent" placeholder="Enter Reservation %" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Reservation Fee<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="reservation_fee" name="reservation_fee" placeholder="Enter Reservation Fee" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Balance<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="balance" name="balance" placeholder="Enter Balance" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Monthly Amortization<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="monthly_amortization" name="monthly_amortization" placeholder="Enter Monthly Amortization" required>
                </div>
                <div class="form-group col-md-12 customize-div">
                    <label class="inputPassword4">Status <span style="color: red">*</span></label>
                    <select class="form-control" name="status" required>
                        <option value="OPEN">OPEN</option>
                        <option value="RESERVED">RESERVED</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-button">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title reserve-title"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form id="modal-form" action="{{url('transaction/reservation')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Customer Name <span style="color: red">*</span></label>
                    <div class="row col-12">
                        <input type="hidden" id="lot_id" name="lot_id" class="form-control col-10"/>
                        <input type="hidden" id="block_no" name="block_no" class="form-control col-10"/>
                        <input type="hidden" id="lot_no" name="lot_no" class="form-control col-10"/>
                        <input type="hidden" id="payment_classification" name="payment_classification" class="form-control col-10" value="RES"/>
                        <input type="hidden" id="customer_id" name="customer_id" class="form-control col-10"/>
                        <input type="text" class="form-control col-10 customer_name" placeholder="Select Order" disabled/>
                        <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#customerList"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Code<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="code" name="code" value="" readonly>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Subscriber No.<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="subscriber_no" name="subscriber_no" placeholder="Enter Subscriber No" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Payment Date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="date" name="date" required>
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
                    <label for="inputPassword4">Amount<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
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
                    <label for="inputPassword4">Remarks <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" required>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-button">Reserve</button>
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
                <table id="customer_records" class="table table-striped" style="width:100%">
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
        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        function checkDownpayment(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/transaction/checkdp/' + id,
                method: 'get',
                success: function(data) {
                   if(data.Message == 'DETECTED') {
                        location.href = '/transaction/soa/' + id
                   } else {
                       alert('No Downpayment! Please provide an amount before calculating monthly amortization.');
                   }
                }
            });
        }

        function LotFunction(status, id, block, lot) {
            if (status == 'OPEN') {
                $('.reserve-title').text('Reserve - ' + $('#area_name').val() + ' Block ' + block + ' Lot ' + lot)
                $('#code').val($('#area_code').val() + '-' + block + '-' + lot)
                $('#lot_id').val(id);
                $('#block_no').val(block);
                $('#lot_no').val(lot);
                $('#reserveModal').modal('show');
            } if (status == 'RESERVED') {
                checkDownpayment(id);
            } if (status == 'INACTIVE') {

            } else {

            }
        }

        function editLot(status, id, block, lot) {
            if (status == 'OPEN') {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/area_detail/edit/' + id,
                    method: 'get',
                    success: function(data) {
                        $('#modal-form-block').attr('action', '/area_detail/update/' + data.area_detail_lot.id);
                        $('.submit-button').text('Update');
                        $('#block').val(data.area_detail_lot.block_id)

                            $.each(data, function() {
                                $.each(this, function(k, v) {
                                    $('#'+k).val(v);
                                });

                            });
                    }
                });
                $('.customize-div').hide();
                $('.block-details-title').text('Edit - ' + $('#area_name').val() + ' Block ' + block + ' Lot ' + lot)
                $('#code').val($('#area_code').val() + '-' + block + '-' + lot)
                $('#lot_id').val(id);
                $('#block_no').val(block);
                $('#lot_no').val(lot);
                $('#blockModal').modal('show');
            } if (status == 'RESERVED') {
                checkDownpayment(id);
            } if (status == 'INACTIVE') {

            }
        }

        function selectCustomer(id, value) {
            $('#customer_id').val(id);
            $('.customer_name').val(value);

            $('#customerList').modal('hide');
        }

        function edit(id) {
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

        function removeLot(id) {
            let message = "Are you sure you want to Delete?";

            if (confirm(message) == true) {
                location.href = '/area/destroy/' + id
            }
        }

        $( document ).ready(function() {
            filterSelection("all");

            $('#customer_records').DataTable({
                scrollX: true,
            });

            $( "body" ).delegate( ".block_btn", "click", function() {
                $('.block_btn').removeClass('active');
                $(this).addClass('active');
            })
        });

    </script>
@endsection

@section('styles')
    <style>
        .action-item {
            text-align: right;
        }
        .action-item button {
            background: #c54545;
            color: #fff !important;
            margin-top: 5px;
            margin-right: 5px;
            float: right;
        }

        .action-item button i {
            color: #fff !important;
        }
        table.dataTable td {
            padding: 3px 10px;
            width: 1px;
            white-space: nowrap;
        }
        thead th {
            white-space: nowrap;
        }
        .filterDiv {
            display: none;
        }
        .show {
            display: block;
        }

        .container {
            margin-top: 20px;
            overflow: hidden;
        }
        .add-block {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 10;
            font-size: 20px;
        }
        span.lot-name {
            display: block;
            font-weight: bold;
            background: #007eff;
            color: #fff;
            text-align: left;
            border-radius: 3px;
            padding: 0 10px;
        }
        .lot-details {
            font-size: 12px;
            text-align: left;
        }
        .lot {
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .lot.OPEN, .square.Open {
            background: #fff;
        }
        .lot.ACTIVE, .square.Active {
            background: #d1ffd1;
        }
        .lot.INACTIVE, .square.Inactive {
            background: #ffd1d1;
        }
        .lot.RESERVED, .square.Reserved {
            background: #fffbd1;
        }

        .lot.FULLYPAID, .square.Fullypaid {
            background: #93bbd2;
        }

        .lot.TURNOVER, .square.Turnover {
            background: #3b577c;
        }

        div#myBtnContainer button {
            background: #eee;
            border: 1px solid #ccc;
            text-transform: uppercase;
            font-size: 12px;
        }
        div#myBtnContainer button.active {
            background: #007eff;
            color: #fff;
            border: 1px solid #007eff;
        }
        .filterDiv h4 {
            text-transform: uppercase;
            color: black;
            background: #fffcb4;
            padding: 10px 15px;
            text-align: left;
        }
        legend>div {
            display: inline-block;
            vertical-align: top;
        }
        .square {
            height: 15px;
            width: 15px;
            display: inline-block;
            border: 1px solid #b3b3b3;
            vertical-align: middle;
        }
        .legend>div {
            display: inline-block;
            margin-right: 11px;
            vertical-align: middle;
        }
        .legend>div>span {
            vertical-align: middle;
        }
        .legend {
            margin-bottom: 20px;
        }
        .edit-lot {
            color: #fff;
            float: right;
            padding: 0px;
            width: auto !important;
        }
        span.name-open {
            display: block;
            text-align: center;
            border-bottom: 1px solid;
        }
        .alert.alert-success.col-md-12.col-lg-12 p {
            display: block !important;
            margin: 0px;
            padding: 5px 10px;
        }
    </style>
@endsection
@stop
