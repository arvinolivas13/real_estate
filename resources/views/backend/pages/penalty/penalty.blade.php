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
                    <h3>Penalty</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#customerModal" style="float:right">
                        Add Penalty
                    </button>
                </div>
                <div class="card-body">
                    <table id="customer_record" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>Subscriber No.</th>
                                <th>Amortization Month</th>
                                <th>Penalty Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penalties as $key => $penalty)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <a href="#" class="align-middle edit" onclick="edit({{ $penalty->id }})" title="Edit" data-toggle="modal" data-target="#customerModal" id={{$penalty->id}}><i class="align-middle fas fa-fw fa-pen"></i></a>
                                        <a href="{{url('customer/destroy/' . $penalty->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                    </td>
                                    <td>{{$penalty->transaction->customer->subscriber_no}}</td>
                                    <td>{{$penalty->transaction->customer->firstname . ' ' . $penalty->transaction->customer->middlename . ' ' . $penalty->transaction->customer->lastname}}</td>
                                    <td>{{$penalty->transaction->code}}</td>
                                    <td>{{ date('M d, Y', strtotime($penalty->amortization->payment_date))}} </td>
                                    <td>{{ date('M d, Y', strtotime($penalty->penalty_date))}}</td>
                                    <td>₱ {{ number_format($penalty->amount, 2)}}</td>
                                    <td>{{$penalty->status}}</td>
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
                    <label for="inputPassword4">Customer Code <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="subscriber_no" name="subscriber_no" placeholder="Enter Customer Code" required>
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