@extends('backend.master.index')

@section('title', 'Commission Summary')

@section('breadcrumbs')
    <span>Transaction</span>  / <span class="highlight">Commission Summary</span>
@endsection


@section('content')
<div class="main">
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Commission Summary</h3>
                </div>
                <div class="card-body">
                    <table id="commission_date" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Contract No.</th>
                                <th>Date Received</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        var employee_id = '';
        $(function() {
            var data = [
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-05-31',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-06-30',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-07-31',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-08-31',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-09-30',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-10-31',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-11-30',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2021-'+scion.create.random(8),
                    "date_received": '2021-12-31',
                    "amount": "P 10,000"
                },
                {
                    "contract_no": '2022-'+scion.create.random(8),
                    "date_received": '2022-01-31',
                    "amount": "P 10,000"
                }
            ];
            var column = [
                { data: 'contract_no', title: "Contract Number" },
                { data: 'date_received', title: "Date Received" },
                { data: 'amount', title: "Amount" }
            ];

            scion.create.static_table('commission_date', data, column, false);
            
        });

    </script>
@endsection

@yield('leaves_tab')

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