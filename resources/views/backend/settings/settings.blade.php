@extends('backend.master.template')

@section('title', 'Customers')

@section('breadcrumbs')
    <span><a href="#" style="color:#fff;">Home</a></span> / <span class="highlight">Delete Control</span>
@endsection


@section('content')
<div class="main p-3">
    <div class="row">
        <div class="col-6">
            <h1>Delete Control</h1>
        </div>
        <div class="col-6 text-right">
            <button class="btn btn-danger" onclick="deleteRecord()">DELETE</button>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-12">
            <div class="form-group col-md-12 customer-name-lookup">
                <label>Select Transaction</label>
                <div style="display: flex">
                    <input type="text" class="form-control transaction_name" placeholder="Select Transaction" disabled/>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transactionList"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12">
            <h5>SUMMARY (Please verify the record to ensure its accuracy.)</h5>
            <br>
            <h2>Transaction Details</h2>
            <div class="transaction">
                <div class="no-record">No Record Found</div>
            </div>
            <br>
            <h2>Monthly Amortization</h2>
            <div class="amortization">
                <div class="no-record">No Record Found</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="transactionList" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>TRANSACTION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <table id="transaction_record" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CODE</th>
                            <th>BLOCK & LOT #</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $key => $item)
                            <tr onclick="selectTransaction({{ $item->id }})">
                                <td>{{++$key}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{"BLOCK ".$item->lot->block->block." LOT ".$item->lot->lot}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <button type="button" class="btn btn-success" onclick="yesDelete()">YES</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="/js/settings.js"></script>
@endsection

@section('styles')
<style>
.dataTables_scrollHeadInner,
table.table.table-striped.dataTable.no-footer {
    width: 100% !important;
}
table#transaction_record tr {
    cursor: pointer;
}
table#transaction_record tr:hover {
    background: #739bb5;
    color: #fff;
}
.no-record {
    padding: 10px;
    text-align: center;
    background: #ccc;
}
.code {
    float: right;
    padding: 5px 10px;
    background: #114ba2;
    color: #fff;
    border-radius: 50px;
    font-size: 12px;
    font-weight: bold;
}
.trans-info {
    font-size: 20px;
    font-weight: bold;
    color: #3f3f3f;
}
.trans-date {
    color: gray;
}

.transaction-item {
    padding: 10px;
    border: 1px solid #ccc;
    margin-bottom: 2px;
    cursor: pointer;
}

.amort-item {
    padding: 3px;
    color: #3f3f3f;
    border-bottom: 1px solid #ccc;
}
</style>
@endsection
@stop