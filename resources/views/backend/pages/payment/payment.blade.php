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
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#customerModal" style="float:right">
                        Add Customer
                    </button>
                </div>
                <div class="card-body">
                    <table id="customer_record" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Customer Name</th>
                                <th>Lot</th>
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
                                    <td>{{$payment->customer_id}}</td>
                                    <td>{{$payment->lot_id}}</td>
                                    <td>{{$payment->payment_date}}</td>
                                    <td>{{$payment->payment_type}}</td>
                                    <td>{{$payment->payment_classification}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->reference_no}}</td>
                                    <td>{{$payment->or_no}}</td>
                                    <td class="text-primary" style="font-weight: bold">File</td>
                                    <td>{{$payment->remarks}}</td>
                                    <td>{{$payment->created_user}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                <form id="modal-form" action="{{url('customer/save')}}" method="post">
                @csrf
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Subscriber No <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="subscriber_no" name="subscriber_no" placeholder="Enter Subscriber No" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">First Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Middle Name</label>
                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Last Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Email <span style="color: red">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Address <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Contact <span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact" required>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Birthday <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Occupation</label>
                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation">
                </div>

                <div class="form-group col-md-12">
                    <label class="inputPassword4">Gender <span style="color: red">*</span></label>
                    <select class="form-control" name="gender" required>
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </select>
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
            $('#customer_record').DataTable({
                scrollX: true,
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
        thead th {
             white-space: nowrap;
        }
    </style>
@endsection
@stop