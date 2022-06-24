@extends('backend.master.template')

@section('title', 'E-SOA')

@section('breadcrumbs')
    <span>E-SOA</span>
@endsection

@section('content')

<div class="main">
    <div id="printableSoa" class="main-container" style="background: white; padding: 10px 40px;">
        <div class="row" style="margin-bottom: 10px;">
            <div style="text-align: left; display: flex;" class="col-8">
                <span><img src="/images/logo.png" style="width: 100px;" alt=""></span>
                <span style="margin-left: 10px;">
                    <p style="margin-bottom: 0px !important; text-transform: uppercase; font-weight: bold; font-size: 20px;color: #2e9e5b;">Brilliant Five J Construction</p>
                    <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Cabrera Road Barangay San Roque, Antipolo City, Rizal</p>
                    <p style="margin-bottom: 0px; font-size: 12px; font-style: italic;">Tel: (027) 211-4250</p>
                    <p style="margin-bottom: 0px; font-size: 12px; font-style: italic;">Mobile Number: Globe: 0917-510-2851, Smart: 0918-308-1378</p>
                    <p style="margin-bottom: 0px; font-size: 12px; font-style: italic;">Email: brilliantfivej@gmail.com</p>
                </span>
            </div>
            <div style="text-align: right;" class="col-4">
                <p style="margin-bottom: 0px !important; font-weight: bold; font-size: 12px;">Page: 1 of 2</p>
                <p style="margin-bottom: 0px !important; font-weight: bold; font-size: 12px;">Date: 06/23/2022</p>
                <p style="margin-botom: 0px !important; font-weight: bold; font-size: 12px;"> Time: 01:37:29 AM</p>
            </div>
        </div>
        <div class="row" style="border-top: 2px solid;">
            <div class="col-12" style="background: #2e9e5b; margin-top: 5px; text-align: center;padding: 5px;">
                <p style="margin: 0px; font-size: 20px; font-weight: bold; text-transform: uppercase; color: white;">Statement of Account</p>
            </div>
        </div>
        <div class="row" style="margin: 10px 0px;">
            <div class="col-8">
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Customer Name: <span style="font-weight: 300;">Agnes Guevarra</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Account Number: <span style="font-weight: 300;">GVF-001</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Block Number: <span style="font-weight: 300;">11</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Lot Number: <span style="font-weight: 300;">11</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Area: <span style="font-weight: 300;"></span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Account Status: <span style="font-weight: 300;">ACTIVE</span></p>
            </div>
            <div class="col-4">
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Purchase Date: <span style="font-weight: 300;">October 28, 2019</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Contract Price: <span style="font-weight: 300;">239,800.00</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Down payment: <span style="font-weight: 300;"></span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Reservation: <span style="font-weight: 300;">11,900</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Ammortization: <span style="font-weight: 300;">5,695</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">OR Number: <span style="font-weight: 300;">0148</span></p>
            </div>
        </div>
        <div class="row" style="border-top: 2px solid;">
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Description</th>
                    <th style="padding: 15px; width: 100px; text-align: left;">Ammortization Date</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">Monthly Ammortization</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">O.R Date</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">O.R No.</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">Cheque No.</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">Amount Due</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">Amount Paid</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">Outstanding Balance</th>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left;">RES</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">10/28/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">10/28/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0148</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">CASH</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">11,900.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">11,900.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">227,900.00</td>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left;">MA</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">11/28/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">5,675.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">11/28/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0149</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">CASH</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">5,675.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">5,675.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">222,135.00</td>
                </tr>
            </table>
        </div>
        <div class="spacer" style="height: 360px;"></div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Totals</th>
                    <th style="padding: 15px; width: 100px; text-align: left;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">239,800.00</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">17,595.00</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">222,205.00</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left; text-decoration: underline;">Interest</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">Interest Date</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Interest Amount</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">O.R Date</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">O.R No.</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Cheque No.</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount Due</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount Paid</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Outstanding Balance</td>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left;">INT</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">12/28/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">675.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">12/15/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0156</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">CASH</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">675.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0.00</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Totals</th>
                    <th style="padding: 15px; width: 100px; text-align: left;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">675.00</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">0.00</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left; text-decoration: underline;">Penalty/Others</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">Penalty Date</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">O.R Date</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">O.R No.</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Cheque No.</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount Due</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount Paid</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Outstanding Balance</td>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left;">PEN</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">12/28/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">505.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">12/15/2022</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">0134</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">CASH</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">505.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">(505.00)</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">(505.00)</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Totals</th>
                    <th style="padding: 15px; width: 100px; text-align: left;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">(505.00)</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                </tr>
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left; font-weight: bold;">Grand Total</td>
                    <td style="padding: 15px; width: 100px; text-align: left;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right; font-weight: bold;">18,775.00</td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                </tr>
            </table>
        </div>
    </div>
    <a onclick='printDiv();' class="float">
        <i class="fa fa-print my-float"></i>
    </a>
</div>
@endsection

@section('scripts')
<script>
   function printDiv() {
        var myStyle = '<link rel="stylesheet" href="backend/css/modern.css" />';
        var divToPrint=document.getElementById('printableSoa');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write(myStyle + '<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
    };
</script>
@endsection

@section('styles')
<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
    background-color: #2e9e5b;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}
a.float:hover {
    color: #e9cb00;
}
.my-float{
	margin-top:22px;
}
.dashboard-greeting {
    background: #2e9e5b;
}
.dashboard-greeting h1 {
    color: #fff !important;
    font-size: 25px !important;
}
.dashboard-greeting .card-details {
    color: #ffff;
    margin-bottom: 15px;
}

</style>
@endsection