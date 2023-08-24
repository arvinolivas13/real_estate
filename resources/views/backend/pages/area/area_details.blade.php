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
                                        <button class="btn" onclick="addLot({{$block->id}})">
                                            <i class="align-middle fas fa-fw fa-plus" style="color: black "></i> Add Lot
                                        </button>
                                    </div>
                                    <h4> {{'BLOCK-' . $block->block}} ({{App\AreaDetailLot::where('block_id', $block->id)->where('status', '!=', 'Open')->count() . '/' .App\AreaDetailLot::where('block_id', $block->id)->count()}}) </h4>
                                        <div class="row">
                                            @foreach ($block->lot as $item)
                                                <div class="col-2">
                                                <div class="lot {{$item->status}}" id="area_lot_{{$item->id}}">
                                                    <span class="lot-name">LOT {{$item->lot}}
                                                        <span class="action-items">
                                                            @if($item->status === "OPEN")
                                                            <button class="btn btn-sm btn-block edit-lot" title="EDIT LOT" onclick="editLot('{{$item->status}}', '{{$item->id}}', '{{$block->block}}', '{{$item->lot}}')"><i class="fas fa-pen"></i></button>
                                                            @endif
                                                            @if($item->status !== "OPEN")
                                                                @if($item->transaction->hide_status === 0)
                                                                    <button class="btn btn-sm btn-block hide" title="HIDE LOT" onclick="hideLot({{$item->transaction->id}}, {{$item->id}}, 1)"><i class="fas fa-eye"></i></button>
                                                                @else
                                                                    <button class="btn btn-sm btn-block hide" title="UNHIDE LOT" onclick="hideLot({{$item->transaction->id}}, {{$item->id}}, 0)"><i class="fas fa-eye-slash"></i></button>
                                                                @endif
                                                            @endif
                                                            <button class="btn btn-sm btn-block" title="ATTACHMENT" onclick="showAttachment({{$item->id}}, '')"><i class="fas fa-paperclip"></i></button>
                                                            <button class="btn btn-sm btn-block" title="CO-OWNER" onclick="coBorrower({{$item->id}})"><i class="fas fa-users"></i></button>
                                                        </span>
                                                    </span>
                                                    <div class="row lot-details" style="cursor: pointer" data-status="{{$item->status}}" onclick="LotFunction('{{$item->id}}', '{{$block->block}}', '{{$item->lot}}')">
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
                        <label for="inputPassword4">Months to Pay<span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="no_of_month" name="no_of_month" placeholder="Enter Total # of Months to Pay" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Reservation Fee<span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="reservation_fee" name="reservation_fee" placeholder="Enter Reservation Fee" required readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Balance<span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="balance" name="balance" placeholder="Enter Balance" required readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Monthly Amortization<span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="monthly_amortization" name="monthly_amortization" placeholder="Enter Monthly Amortization" required readonly>
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
                    <h5 class="modal-title reserve-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-3">
                    <form id="reservation_form" action="{{url('transaction/reservation')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12 customer-name-lookup">
                        <label for="inputPassword4">Customer Name <span style="color: red">*</span></label>
                        <div class="row col-12">
                            <input type="hidden" id="lot_id" name="lot_id" class="form-control col-10"/>
                            <input type="hidden" id="block_no" name="block_no" class="form-control col-10"/>
                            <input type="hidden" id="lot_no" name="lot_no" class="form-control col-10"/>
                            <input type="text" class="form-control col-10 customer_name" placeholder="Select Order" disabled/>
                            <button type="button" class="btn btn-primary col-2" data-toggle="modal" data-target="#customerList"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <div class="form-group col-md-12 customerName">
                        <label for="inputPassword4">Customer Name<span style="color: red"></span></label>
                        <input type="text" class="form-control" id="customerName" value="" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Code<span style="color: red">*</span></label>
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="">
                        <input type="hidden" id="payment_classification" name="payment_classification" class="form-control col-10" value="RES"/>
                        <input type="text" class="form-control" id="code" name="code" value="" readonly>
                    </div>

                    <div class="form-group col-md-12 subscriberNo">
                        <label for="inputPassword4">Subscriber No.<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="subscriber_no" name="subscriber_no" placeholder="Enter Subscriber No">
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
                    {{-- <div class="form-group col-md-12">
                        <label for="inputPassword4">Attachment</label>
                        <input type="file" class="form-control" id="attachment" name="attachment">
                    </div> --}}
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Remarks <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit-button reserve-button" onclick="reserve()">Reserve</button>
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
                    <h5>ORDERS</h5>
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


<div class="modal fade" id="coborrowerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block-details-title">CO-OWNER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group name">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control">
                                <button class="btn btn-success" onclick="saveCoborrower()">SAVE</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="co_borrower_table" class="table table-striped" style="width:100%"></table>
                    </div>
                </div>
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
                    <div class="col-3">
                        <ul class="attachment-list">
                            <li>
                                <div class="list-item active" id="buyers_info">BUYER'S INFORMATION SHEET</div>
                            </li>
                            <li>
                                <div class="list-item" id="birth">BIRTHCERTIFICATE/ PSA</div>
                            </li>
                            <li>
                                <div class="list-item" id="valid_id">2 VALID ID</div>
                            </li>
                            <li>
                                <div class="list-item" id="certificate">CERTIFICATE OF MARRIAGE</div>
                            </li>
                            <li>
                                <div class="list-item" id="contract">CONTRACT</div>
                            </li>
                            <li>
                                <div class="list-item" id="authorization">AUTHORIZATION LETTER</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <div class="attachment-container">
                            <div class="attachment-action">
                                <button class="btn btn-primary add-attachment" onclick="addAttachment()">ADD ATTACHMENT</button>
                            </div>
                            <div class="attachment-item row"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addAttachment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block-details-title">ATTACHMENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentForm" method="POST"  action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="attach_file">FILE</label>
                            @csrf
                            <input type="file" name="attach_file[]" id="attach_file" class="form-control" accept="image/*,.pdf" multiple/>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">UPLOAD</button>
                        </div>
                    </div>
                </form>
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

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>

        var table;
        var lot_id = null;
        var type = 'buyers_info';
        var co_borrower_id = '';
        var storage = "{{asset('/storage/app/')}}";
        var selected_lot = null;

        $(document).ready(function() {
            filterSelection("all");

            $('#reservation_percent, #tcp, #no_of_month').change(function(){
                $('#reservation_fee').val(($('#reservation_percent').val() / 100) * $('#tcp').val());
                $('#balance').val($('#tcp').val() - (($('#reservation_percent').val() / 100) * $('#tcp').val()));
                $('#monthly_amortization').val(parseFloat($('#balance').val()  / $('#no_of_month').val()).toFixed(2));
            })

            $('#customer_records').DataTable({
                scrollX: true,
            });

            $( "body" ).delegate( ".block_btn", "click", function() {
                $('.block_btn').removeClass('active');
                $(this).addClass('active');
            }).delegate('.list-item', 'click', function() {
                type = this.id;
                $('.list-item').removeClass('active');
                $('#'+ this.id).addClass('active');

                getAttachmentItem();
            });

            $('#attachmentForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                let TotalFiles = $('#attach_file')[0].files.length; //Total files
                let files = $('#attach_file')[0];

                for (let i = 0; i < TotalFiles; i++) {
                    formData.append('files' + i, files.files[i]);
                }

                formData.append('TotalFiles', TotalFiles);
                formData.append('lot_id', lot_id);
                formData.append('type', type);
                formData.append('co_borrower_id', co_borrower_id);

                $.ajax({
                    type:'POST',
                    url: "/attachment/save",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                        this.reset();
                        $('#addAttachment').modal('hide');
                        getAttachmentItem();
                    },
                    error: function(data){
                        alert(data.responseJSON.errors.files[0]);
                    }
                });

            });

        });

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            c = c + " ";
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
                console.log(arr1, arr2[i]);
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

        function checkDownpayment(status, id, block, lot) {
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
                        Swal.fire({
                            title: 'Please provide Downpayment to proceed with calculation of Monthly Amortization.',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Process Downpayment',
                            denyButtonText: `Zero Downpayment`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $('.customerName').show();
                                $('#customer_id').val(data.customer.id);
                                $('#payment_classification').val('DP');
                                $('#customerName').val(data.customer.firstname + ' ' + data.customer.middlename + ' ' + data.customer.lastname);
                                $('.customer-name-lookup').hide();
                                $('.subscriberNo').hide();
                                $('.reserve-title').text('Process Downpayment - ' + $('#area_name').val() + ' Block ' + block + ' Lot ' + lot)
                                $('#code').val($('#area_code').val() + '-' + block + '-' + lot)
                                $('#lot_id').val(id);
                                $('#block_no').val(block);
                                $('#lot_no').val(lot);
                                $('#reserveModal').modal('show');
                                $('.reserve-button').text('Down Payment');
                                $('#modal-form').attr('action', '/payment/save');
                            } else if (result.isDenied) {
                                var record = {
                                    _token: "{{csrf_token()}}",
                                    customer_id: data.customer.id,
                                    code: $('#area_code').val() + '-' + block + '-' + lot,
                                    date: moment().format('YYYY-MM-DD'),
                                    payment_id: 1,
                                    payment_classification: 'DP',
                                    amount: 0,
                                    reference_no: '',
                                    or_no: '',
                                    attachment: null,
                                    remarks: '',
                                    action: 'save',
                                    id: null
                                };

                                $.post('/payment/save', record).done(function(response) {
                                    location.reload();
                                });
                            }
                        })
                    }
                }
            });
        }

        function LotFunction(id, block, lot) {
            selected_lot = id;
            var status = $('#area_lot_' + id + ' .lot-details').attr('data-status');
            if (status == 'OPEN') {
                $('.customerName').hide();
                $('.customer-name-lookup').show();
                $('.subscriberNo').show();
                $('.reserve-title').text('Reserve - ' + $('#area_name').val() + ' Block ' + block + ' Lot ' + lot)
                $('#code').val($('#area_code').val() + '-' + block + '-' + lot)
                $('#lot_id').val(id);
                $('#block_no').val(block);
                $('#lot_no').val(lot);
                $('#reserveModal').modal('show');
            } if (status == 'RESERVED' || status == 'ACTIVE') {
                checkDownpayment(status, id, block, lot);
            } if (status == 'INACTIVE') {

            } else {

            }
        }

        function editLot(status, id, block, lot) {
            if (status == 'OPEN' || status == 'ACTIVE') {
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
                checkDownpayment(status, id, block, lot);
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
                    $('#modal-form').attr('action', '/customer/update/' + data.customer.id);
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

        function addLot(id) {
            let message = "Are you sure you want to Add?";

            if (confirm(message) == true) {
                location.href = '/area/add/' + id
            }
        }

        function showAttachment(id, borrower) {
            lot_id = id;
            co_borrower_id = borrower;

            $('#attachmentModal').modal('show');
            getAttachmentItem();
        }

        function coBorrower(id) {
            lot_id = id;

            if ($.fn.DataTable.isDataTable('#co_borrower_table')) {
                $('#co_borrower_table').DataTable().clear().destroy();
            }

            table = $('#co_borrower_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/co_borrower/get/'+lot_id,
                    type: 'GET'
                },
                columns: [
                    { data: null, title: 'ACTION', render: function(data, type, row, meta) {
                        var html = "<td>";
                            html += "<a href='#' class='align-middle edit' onclick='showAttachment("+lot_id+", "+row.id+")' title='ATTACHMENT'><i class='align-middle fas fa-fw fa-paperclip'></i></a>";
                            html += "</td>";
                        return html;
                    }},
                    { data: 'name', title: 'NAME', class:'data-name'}
                ]
            });

            $('#coborrowerModal').modal('show');
        }

        function saveCoborrower() {
            $.post('/co_borrower/save', { _token: "{{csrf_token()}}", lot_id: lot_id, name: $('#name').val() }).done(function(response) {
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

        function addAttachment() {
            $('#addAttachment').modal('show');
        }

        function getAttachmentItem() {
            var html = '';

            $.post('/attachment/show', {_token:"{{csrf_token()}}", id: lot_id, type: type, co_borrower_id: co_borrower_id}, function(response) {
                $.each(response.attachments, (i, v) => {
                    var ext = v.file_name.split('.');
                    if(ext[1] === "pdf") {
                        html += "<div class='file-item col-3'><span class='remove-img' onclick='removeFile("+v.id+", \"/storage/" + v.file_name.replace('public/','') + "\")'><i class='fas fa-trash'></i></span><div onclick='fileView("+'"/storage/'+v.file_name.replace('public/','')+'"'+")'><div class='file-img' style='background:url(/images/pdf.png)'></div><div class='file-name'>"+v.type+"_"+i+"</div></div></div>";
                    }
                    else {
                        html += "<div class='file-item col-3'><span class='remove-img' onclick='removeFile("+v.id+", \"/storage/" + v.file_name.replace('public/','')+ "\")'><i class='fas fa-trash'></i></span><div onclick='imageView("+'"/storage/'+v.file_name.replace('public/','')+'"'+")'><div class='file-img' style='background:url(/storage/" + v.file_name.replace('public/','') + ")'></div><div class='file-name'>"+v.type+"_"+i+"</div></div></div>";
                    }
                });
                $('.attachment-item').html(html);
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

        function reserve() {
            event.preventDefault();

            var form = $('#reservation_form')[0];
            var formData = new FormData(form);

            $.ajax({
                url: "/transaction/reservation",
                method: "post",
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    $('#area_lot_' + selected_lot).removeClass('ACTIVE');
                    $('#area_lot_' + selected_lot).addClass('RESERVED');
                    $('#area_lot_' + selected_lot + ' .lot-details').attr('data-status', 'RESERVED');

                    $('#reserveModal').modal('hide');
                },
                error: function (e) {
                    //error
                }
            });
        }

        function hideLot(id, lot_id, val) {
            var data = {
                _token: '{{csrf_token()}}',
                id: id,
                status: val
            };

            $.post('/transaction/hide_lot', data, function() {
                if(val === 1) {
                    $('#area_lot_' + lot_id + ' .hide').html('<i class="fas fa-eye-slash"></i>');
                }
                else {
                    $('#area_lot_' + lot_id + ' .hide').html('<i class="fas fa-eye"></i>');
                }
            });
        } 

    </script>
@endsection

@section('styles')
<style>
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
.action-item {
    text-align: right;
}
.action-item button {
    background: gray;
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
span.action-items button {
    display: inline-block !important;
    width: 16px !important;
    vertical-align: top;
    margin: 0px !important;
    text-align: center !important;
    padding: 1px 0px;
    color: #fff;
}
span.action-items {
    float: right;
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
