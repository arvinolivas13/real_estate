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
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Birthday</th>
                                <th>Occupation</th>
                                <th>Gender</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key => $customer)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <a href="#" class="align-middle edit" onclick="edit({{ $customer->id }})" title="Edit" data-toggle="modal" data-target="#customerModal" id={{$customer->id}}><i class="align-middle fas fa-fw fa-pen"></i></a>
                                        <a href="#" class="align-middle" onclick="attachment({{ $customer->id }})" title="Attachment" data-toggle="modal" data-target="#attachmentModal" id={{$customer->id}}><i class="align-middle fas fa-fw fa-file"></i></a>
                                        <a href="#" class="align-middle" onclick="uploadAttachment({{ $customer->id }})" title="Upload" data-toggle="modal" data-target="#uploadModal" id={{$customer->id}}><i class="align-middle fas fa-fw fa-upload"></i></a>
                                        <a href="{{url('customer/destroy/' . $customer->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                    </td>
                                    <td>{{$customer->subscriber_no}}</td>
                                    <td>{{$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->contact}}</td>
                                    <td>{{$customer->birthday}}</td>
                                    <td>{{$customer->occupation}}</td>
                                    <td>{{$customer->gender}}</td>
                                    <td>{{$customer->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

@include('backend.partial.component.attachment')
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
                <form id="customerForm" action="{{url('customer/save')}}" method="post">
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
                    <label for="inputPassword4">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
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
                    console.log(data.customer.id);
                    $('#customerForm').attr('action', 'customer/update/' + data.customer.id);
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

        function uploadAttachment(id) {
            $('#customer_id').val(id)
        }

        function attachment(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/attachment/show/' + id,
                method: 'get',
                success: function(data) {
                    $('#attachment-pdf-list, #attachment-image-list').empty();
                    var record = data.attachments;
                    for (let index = 0; index < record.length; index++) {
                        var path = '/attachment/requirement/' + record[index].id + '/' + record[index].attachment + "'" + ',' + "'" +  record[index].type;
                        $('#attachment-pdf-list').append('<a href="#" onclick="viewAttachment('+"'"+path+"'"+')">' + record[index].code + '</a>')
                        console.log(record[index].attachment);
                    }
                }
            });
        }

        function viewAttachment(file, type) {
            if(type === "jpg") {
                $('.no_attachment').css('display','none');
                $('#pdf_attachment').css('display','none');
                $('#image_attachment').attr('src',file);
                $('#image_attachment').css('display','block');
            }
            else {
                $('.no_attachment').css('display','none');
                $('#image_attachment').css('display','none');
                $('#pdf_attachment').attr('src',file);
                $('#pdf_attachment').css('display','block');
            }
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
