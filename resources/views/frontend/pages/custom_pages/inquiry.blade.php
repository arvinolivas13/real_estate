@extends('frontend.master.index')

@section('content')
<!--Breadcrumbs start-->
<div class="breadcrumbs overlay-black">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumbs-title text-center">
                        <h1>Account Status</h1>
                    </div>
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="index.html">Home /</a></li>
                            <li>Account Status</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumbs end-->

        <!--elements start-->
        <div class="elements ptb-100 bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-10 account-name">Account Name: Juan Dela Cruz
                        </h5>
                        <div class="row mb-40 plan-info">
                            <div class="col-md-4">Account No.: 0000-000</div>
                            <div class="col-md-4">Date Purchased: January 6, 2020</div>
                            <div class="col-md-4">Project: Grand Villas Farm 1</div>
                        </div>
                        <div class="row mb-20 payment-info">
                            <div class="col-md-4"><h5 class="mb-10">TCP: 2,000,000.00</h5></div>
                            <div class="col-md-4"><h5 class="mb-10">Balance: 1,530,000.00</h5></div>
                            <div class="col-md-4"><h5 class="mb-10">Total Payment: 465,000.00</h5></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                        <tr>
                                            <th scope="col">Transaction No.</th>
                                            <th scope="col">Payment Type</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date of Payment</th>
                                            <th scope="col">Reference No.</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row">0001</th>
                                            <td>GCASH</td>
                                            <td>1999</td>
                                            <td>2020-01-01</td>
                                            <td>QWE123</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--elements end-->
@endsection

@section('style')
<style>
    h4.mb-10.account-name {
    color: white;
    background: forestgreen;
    padding: 15px;
}
.row.mb-40.plan-info {
    margin: 0px 0px 40px 0px;
    font-weight: bold;
    color: forestgreen;
}
.row.mb-20.payment-info {
    margin: 0px 0px 10px 0px;
}
.table thead th {
    font-weight: bold;
    color: forestgreen;
}
</style>
@endsection