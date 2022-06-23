@extends('backend.master.template')

@section('title', 'Area Details')

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
                    <button type="button" class="btn btn-success add-block" data-toggle="modal" data-target="#customerModal" style="float:right">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
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
                                        <h4> {{'BLOCK-' . $block->block}} ({{App\AreaDetailLot::where('block_id', $block->id)->where('status', '!=', 'Open')->count() . '/' .App\AreaDetailLot::where('block_id', $block->id)->count()}}) </h4>
                                        
                                        <div class="row">
                                            @foreach ($block->lot as $item)
                                                <div class="col-2">
                                                    <div class="lot {{$item->status}}">
                                                        <span class="lot-name">LOT {{$item->lot}}</span>
                                                        <div class="row lot-details">
                                                            <div class="col-6">
                                                                Area: {{$item->area}} <br>
                                                                TCP: {{$item->tcp}} <br>
                                                            </div>
                                                            <div class="col-6">
                                                                PSQM: {{$item->psqm}}<br>
                                                                MA: {{$item->monthly_amortization}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <a href="{{url('area/destroy/' . $block->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash" style="color: black"></i></a>
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

        $(function() {
            filterSelection("all");

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
            border-radius: 3px;
            margin-bottom: 10px;
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
        .lot.Open {
            background: #d1ffd1;
        }
        .lot.Cancel {
            background: #ffd1d1;
        }
        .lot.Taken {
            background: #fffbd1;
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
            margin-bottom: 20px;
            color: black;
            background: #fffcb4;
            padding: 10px 3px;
        }
    </style>
@endsection
@stop