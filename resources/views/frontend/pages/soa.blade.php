<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brilliant Five J Construction and Development Corp.</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('/js/jquery.validate.min.js')}}" ></script>
    <link href="{{{ URL::asset('backend/css/modern.css') }}}" rel="stylesheet">
    <link href="{{asset('/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/custom.css')}}" rel="stylesheet">
    {{-- <script src="{{{ URL::asset('backend/js/settings.js') }}}"></script> --}}
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{asset('lib/main.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>

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
                <p style="margin: 0px; font-size: 20px; font-weight: bold; text-transform: uppercase; color: white;">Statement of Account
                    @if ($generate_amortization == false)
                    <i class="align-middle mr-2 fas fa-fw fa-file-invoice"  data-toggle="modal" data-target="#amortizationModal" title="Generate Monthly Amortization"></i>
                    @endif
                    </p>
            </div>
        </div>
        <div class="row" style="margin: 10px 0px;">
            <div class="col-8">
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Customer Name: <span style="font-weight: 300;">{{$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Subscriber Number: <span style="font-weight: 300;">{{$customer->subscriber_no}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Block Number: <span style="font-weight: 300;">Block {{$lot->block->block}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Lot Number: <span style="font-weight: 300;">Lot {{$lot->lot}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Area: <span style="font-weight: 300;">{{$lot->area}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Account Status: <span style="font-weight: 300;">ACTIVE</span></p>
            </div>
            <div class="col-4">
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Purchase Date: <span style="font-weight: 300;">{{$lot->purchase_date}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Contract Price: <span style="font-weight: 300;">₱ {{ number_format($lot->tcp, 2)}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Down payment: <span style="font-weight: 300;">₱ {{ number_format($dp->amount, 2)}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Reservation: <span style="font-weight: 300;">₱ {{ number_format($res->amount, 2)}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">Ammortization: <span style="font-weight: 300;">₱ {{ number_format($lot->monthly_amortization, 2) }}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 13px;">OR Number: <span style="font-weight: 300;">0148</span></p>
            </div>
        </div>
        <div class="row" style="border-top: 2px solid;">
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">DESCRIPTION</th>
                    <th style="padding: 15px; width: 100px; text-align: left;">AMORT DUE DATE</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">DATE OF PAYMENT</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">MOP</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">REF NO</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">CHEQUE NO</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">OR NO</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">AMOUNT DUE</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">AMOUNT PAID</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">OUTSTANDING BALANCE</th>
                </tr>

                @php
                    $contract_price = $lot->tcp;
                    $total_penalty = 0;
                    $total_transfer_fee = 0;
                @endphp

                @foreach ($payments as $payment)
                    @php
                        $contract_price = $contract_price - $payment->amount
                    @endphp

                    @if ($payment->payment_classification == 'RES' || $payment->payment_classification == 'DP' )
                        <tr>
                            <td style="padding: 15px; width: 100px; text-align: left;">{{$payment->payment_classification}}</td>
                            <td style="padding: 15px; width: 100px; text-align: left;">--</td>
                            <td style="padding: 15px; width: 100px; text-align: right;">{{ date('M d, Y', strtotime($payment->date)) }}</td>
                            <td style="padding: 15px; width: 100px; text-align: right;">{{$payment->paymenttype->payment}}</td>
                            <td style="padding: 15px; width: 100px; text-align: right;">{{$payment->reference_no}}</td>
                            <td style="padding: 15px; width: 100px; text-align: right;"></td>
                            <td style="padding: 15px; width: 100px; text-align: right;">{{$payment->or_no}}</td>
                            <td style="padding: 15px; width: 100px; text-align: right;">--</td>
                            <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($payment->amount, 2)}}</td>
                            <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($contract_price, 2)}}</td>
                        </tr>
                    @else
                        @if($payment->payment_classification == 'MA')
                            <tr>
                                <td style="padding: 15px; width: 100px; text-align: left;">{{ $payment->payment_classification . ' ('. $payment->amortization->counter .')'}}</td>
                                <td style="padding: 15px; width: 100px; text-align: left;">{{ date('M d, Y', strtotime($payment->amortization->payment_date)) }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;"> {{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">{{$payment->paymenttype->payment}}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">{{ $payment->reference_no }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;"></td>
                                <td style="padding: 15px; width: 100px; text-align: right;">{{ $payment->or_no }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($lot->monthly_amortization, 2) }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format( $payment->amount, 2)}}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format( $contract_price, 2)}}</td>
                            </tr>
                        @else
                            <tr>
                                <td style="padding: 15px; width: 100px; text-align: left;">{{ $payment->payment_classification }}</td>
                                <td style="padding: 15px; width: 100px; text-align: left;">{{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;"> {{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">{{$payment->paymenttype->payment}}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">{{ $payment->reference_no }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;"></td>
                                <td style="padding: 15px; width: 100px; text-align: right;">{{ $payment->or_no }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($lot->monthly_amortization, 2) }}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format( $payment->amount, 2)}}</td>
                                <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format( $contract_price, 2)}}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach

                @foreach ($amortizations as $amortization)
                    <tr>
                        <td style="padding: 15px; width: 100px; text-align: left;">{{$amortization->payment_classification . ' ('.$amortization->counter .')'}}</td>
                        <td style="padding: 15px; width: 100px; text-align: left;">{{ date('M d, Y', strtotime($amortization->payment_date)) }}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">--</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($amortization->balance, 2)}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">₱ 0.00</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($contract_price, 2)}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="spacer" style="height: 60px;"></div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Totals</th>
                    <th style="padding: 15px; width: 100px; text-align: left;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($lot->tcp, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($lot->tcp - $regular_amount_pay, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($regular_amount_pay, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                </tr>
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
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

                @foreach ($penalties as $penalty)
                @php
                    $total_penalty = $total_penalty + $penalty->amount;
                @endphp
                    <tr>
                        <td style="padding: 15px; width: 100px; text-align: left;">PEN</td>
                        <td style="padding: 15px; width: 100px; text-align: left;">{{$penalty->penalty_date}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">{{ number_format($penalty->amount, 2)}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">{{ number_format($penalty->amount, 2)}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">({{ number_format($total_penalty, 2)}})</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Total</th>
                    <th style="padding: 15px; width: 100px; text-align: left;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($penalty_amount_due, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($penalty_amount_pay, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($penalty_amount_due, 2)}}</th>
                </tr>
            </table>
        </div>

        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left; text-decoration: underline;">Transfer Fee</td>
                    <td style="padding: 15px; width: 100px; text-align: left;">Date</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">O.R Date</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">O.R No.</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Cheque No.</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount Due</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Amount Paid</td>
                    <td style="padding: 15px; width: 100px; text-align: right;">Outstanding Balance</td>
                </tr>

                @foreach ($transfer_fees as $transfer_fee)
                @php
                    $total_transfer_fee = $total_transfer_fee + $transfer_fee->amount;
                @endphp
                    <tr>
                        <td style="padding: 15px; width: 100px; text-align: left;">TF</td>
                        <td style="padding: 15px; width: 100px; text-align: left;">{{$transfer_fee->penalty_date}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">{{ number_format($transfer_fee->amount, 2)}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">{{ number_format($transfer_fee->amount, 2)}}</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">-</td>
                        <td style="padding: 15px; width: 100px; text-align: right;">{{ number_format($total_transfer_fee, 2)}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 15px; width: 100px; text-align: left;">Total</th>
                    <th style="padding: 15px; width: 100px; text-align: left;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($transfer_fee_amount_due, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($transfer_fee_amount_due, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;">₱ {{ number_format($transfer_fee_amount_pay, 2)}}</th>
                    <th style="padding: 15px; width: 100px; text-align: right;"></th>
                </tr>
            </table>
        </div>

        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr>
                    <td style="padding: 15px; width: 100px; text-align: left; font-weight: bold;">Grand Total</td>
                    <td style="padding: 15px; width: 100px; text-align: left;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                    <td style="padding: 15px; width: 100px; text-align: right; font-weight: bold;">₱ {{ number_format(($penalty_amount_due + $transfer_fee_amount_due) + ($lot->tcp - $regular_amount_pay), 2)}}</td>
                    <td style="padding: 15px; width: 100px; text-align: right; font-weight: bold;">₱ {{ number_format($penalty_amount_pay + $regular_amount_pay + $transfer_fee_amount_pay, 2)}}</td>
                    <td style="padding: 15px; width: 100px; text-align: right;"></td>
                </tr>
            </table>
        </div>
    </div>

    <a onclick='printDiv();' class="float">
        <i class="fa fa-print my-float"></i>
    </a>
</div>
<script src="{{{ URL::asset('backend/js/app.js') }}}"></script>
<script src="{{asset('lib/main.js')}}"></script>
<script src="{{asset('/plugins/cropimg/cropzee.js')}}" ></script>
<script src="{{asset('/plugins/toastr/toastr.min.js')}}" ></script>
<script src="{{asset('/js/global.js')}}" ></script>
<script>
    $(function() {

    });

   function printDiv() {
        var myStyle = '<link rel="stylesheet" href="/backend/css/modern.css" />';
        var divToPrint=document.getElementById('printableSoa');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write(myStyle + '<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        // setTimeout(function(){newWin.close();},10);
    };

    function generate_amort(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/transaction/generate_amort/' + id,
            method: 'get',
            success: function(data) {

            }
        });
    }
</script>

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

</body>
</html>
