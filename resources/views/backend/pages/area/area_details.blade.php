@extends('backend.master.template')

@section('title', 'Customers')

@section('breadcrumbs')
    <span><a href="{{url('area')}}" style="color:#fff;">Area</a></span> / <span class="highlight">Area Details</span>
@endsection


@section('content')
<div class="main">
<div class="row">
    @include('backend.partial.flash-message')
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Area Details</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#customerModal" style="float:right">
                        Add Block
                    </button>
                </div>
                <div class="card-body">
                        <div id="myBtnContainer ">
                            <button class="block_btn btn active" onclick="filterSelection('all')">All</button>
                            @foreach ($blocks as $block)
                                <button class="block_btn btn" onclick="filterSelection('{{'block-' . $block->block}}')">{{$block->block}}</button>
                            @endforeach
                        </div>
                      <div class="mt-3">
                            @foreach ($blocks as $block)
                                <div class="filterDiv {{'block-' . $block->block}} col-12">
                                    <div class="card text-center">
                                        <div class="card-header">
                                         <h4> {{'BLOCK-' . $block->block}} ({{App\AreaDetailLot::where('block_id', $block->id)->where('status', '!=', 'Open')->count() . '/' .App\AreaDetailLot::where('block_id', $block->id)->count()}}) </h4>
                                        </div>
                                            <div class="card-body row">
                                                 @foreach ($block->lot as $item)
                                                    <div class="card mr-2" onclick="LotFunction('{{ $item->id, $block->block, $item->lot }}')">
                                                        <div class="card-body">
                                                        <h5 class="card-title">LOT {{$item->lot}}</h5>
                                                        <h5 class="card-title">Area: {{$item->area}}</h5>
                                                        <h5 class="card-title">TCP: {{$item->tcp}}</h5>
                                                        <h5 class="card-title">PSQM: {{$item->psqm}}</h5>
                                                        <h5 class="card-title">MA: {{$item->monthly_amortization}}</h5>
                                                        <h6 class="mb-2 badge-success" >{{$item->status}}</h6>
                                                            <a href="{{url('area_detail/' . $item->id)}}"><i class="align-middle fas fa-fw fa-pen" style="color: black"></i></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <a href="{{url('area/destroy/' . $block->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash" style="color: black"></i></a>
                                            </div>
                                        <div class="card-footer text-muted">
                                          Status: {{$block->status}}
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
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form id="modal-form" action="{{url('area_detail/save')}}" method="post">
                @csrf
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Block # <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="area_id" name="area_id" value="{{$area_id}}" required hidden>
                    <input type="text" class="form-control" id="block" name="block" placeholder="Enter Block No" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Lot Quantity<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="lot" name="lot" placeholder="Enter Lot Quantity" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Area<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="area" name="area" placeholder="Enter Lot Area" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">P/SQM<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="psqm" name="psqm" placeholder="Enter P/SQM" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">TCP<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="tcp" name="tcp" placeholder="Enter TCP" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Reservation %<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="reservation_percent" name="reservation_percent" placeholder="Enter Reservation %" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Reservation Fee<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="reservation_fee" name="reservation_fee" placeholder="Enter Reservation Fee" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Balance<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter Balance" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Monthly Amortization<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="monthly_amortization" name="monthly_amortization" placeholder="Enter Monthly Amortization" required>
                </div>
                <div class="form-group col-md-12">
                    <label class="inputPassword4">Status <span style="color: red">*</span></label>
                    <select class="form-control" name="status" required>
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
                <form id="modal-form" action="{{url('area_detail/save')}}" method="post">
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
                    <label for="inputPassword4">Lot Quantity<span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="lot" name="lot" placeholder="Enter Lot Quantity" required>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-button">Add</button>
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

        function LotFunction(id, block, lot) {
            alert(block);
            $('.reserve-title').text('Reserve ' + 'Block - ' + block + 'Lot - ' + lot)
            $('#reserveModal').modal('show'); 
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

        /* Style the buttons */
        .btn {
            border: none;
            outline: none;
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #ddd;
        }

        .btn.active {
            background-color: #666;
            color: white;
        }
    </style>
@endsection
@stop