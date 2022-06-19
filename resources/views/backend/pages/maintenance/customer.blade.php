@extends('backend.master.template')

@section('title', 'Customers')

@section('breadcrumbs')
    <span>Main</span>  /  <span><a href="/transaction/area" style="color:#fff;">Home</a></span> / <span class="highlight">Customers</span>
@endsection


@section('content')
<div class="main">
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Customer Information</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#positionModal" style="float:right">
                        Add Customer
                    </button>
                </div>
                <div class="card-body">
                    <table id="customer_record" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Subscriber No</th>
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
                                    <td>{{$key++}}</td>
                                    <td>{{$key++}}</td>
                                    <td>{{$customer->Subscriber}}</td>
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
</div>

<div class="modal fade bd-example-modal-lg" id="customer_reports" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <h1 class="customer-name">Sample Data</h1>
                </div>
                <div class="col-12 mt-3">
                    <table id="customer_reports_table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Transaction Number</th>
                                <th>Payment Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Reference Number</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            alert('test');
            $('#customer_record').DataTable();
        });

    </script>
@endsection

@section('styles')
<style>

table#customer_record tbody tr {
    cursor: pointer;
    transition: .3s;
}

.balance-data .label {
    font-size: 20px;
    font-weight: bold;
    color: #000;
}

.balance-data .total {
    font-size: 30px;
    display: block;
    color: #3f3f3f;
}

h1.customer-name {
    margin-bottom: 25px;
}

.balance-data {
    padding: 10px 15px;
    background: #eee;
    border-radius: 6px;
}

table#customer_record tbody tr:hover {
    background: #eee;
}

.area {
    background-position: center center !important;
    background-size: cover !important;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    margin: 10px 0;
}
.area:hover {
    transform: scale(1.05);
}
.area-body {
    background: rgba(0,0,0,0.4);
    color: #fff;
    padding: 10px;
    border-radius: 8px;
}
span.area-count {
    display: block !important;
    font-size: 50px;
}
span.area-name {
    display: block;
    font-size: 24px;
    padding: 10px 0;
    text-transform: uppercase;
    font-weight: bold;
}
span.area-details {
    font-size: 15px;
}
</style>
@endsection
@stop