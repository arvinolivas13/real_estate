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
                    <p style="margin-bottom: 0px; font-size: 15px; font-style: italic;">Tel: (027) 211-4250</p>
                    <p style="margin-bottom: 0px; font-size: 15px; font-style: italic;">Mobile Number: Globe: 0917-510-2851, Smart: 0918-308-1378</p>
                    <p style="margin-bottom: 0px; font-size: 15px; font-style: italic;">Email: brilliantfivej@gmail.com</p>
                </span>
            </div>
            <div style="text-align: right;" class="col-4">
                <p style="margin-bottom: 0px !important; font-weight: bold; font-size: 15px;">Page: 1 of 2</p>
                <p style="margin-bottom: 0px !important; font-weight: bold; font-size: 15px;">Date: 06/23/2022</p>
                <p style="margin-botom: 0px !important; font-weight: bold; font-size: 15px;"> Time: 01:37:29 AM</p>
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
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Customer Name: <span style="font-weight: 300;">{{$customer->firstname . ' ' . $customer->middlename . ' ' . $customer->lastname}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Subscriber Number: <span style="font-weight: 300;">{{$customer->subscriber_no}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Block Number: <span style="font-weight: 300;">Block {{$lot->block->block}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Lot Number: <span style="font-weight: 300;">Lot {{$lot->lot}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Area: <span style="font-weight: 300;">{{$lot->area}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Account Status: <span style="font-weight: 300;">ACTIVE</span></p>
            </div>
            <div class="col-4">
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Purchase Date: <span style="font-weight: 300;">{{$lot->purchase_date}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">End Date: <span style="font-weight: 300;">{{$lot->end_date}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Contract Price: <span style="font-weight: 300;">₱ {{ number_format($lot->tcp, 2)}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Down payment: <span style="font-weight: 300;">₱ {{ number_format($dp->amount, 2)}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Reservation: <span style="font-weight: 300;">₱ {{ number_format($res->amount, 2)}}</span></p>
                <p style="margin-bottom: 0px; font-weight: 500; font-size: 15px;">Ammortization: <span style="font-weight: 300;">₱ {{ number_format($lot->monthly_amortization, 2) }}</span></p>
            </div>
        </div>
        <div class="row" style="border-top: 2px solid;">
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 13px;">
                <tr style="border-bottom: 2px solid;">
                    <th style="padding: 13px; width: 100px; text-align: left;">DESCRIPTION</th>
                    <th style="padding: 13px; width: 100px; text-align: left;">AMORT DUE DATE</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">DATE OF PAYMENT</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">MOP</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">REF NO</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">OR NO</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">AMOUNT DUE</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">AMOUNT PAID</th>
                    <th style="padding: 13px; width: 100px; text-align: right;">OUTSTANDING BALANCE</th>
                </tr>

                @php
                    $contract_price = $lot->tcp;
                    $total_penalty = 0;
                    $total_transfer_fee = 0;
                @endphp

                @foreach ($payments as $payment)

                    @if ($payment->payment_classification == 'RES' || $payment->payment_classification == 'DP' )
                        @php
                            $contract_price = $contract_price - $payment->amount
                        @endphp
                        @if ($payment->payment_classification == 'DP' && $payment->amount == 0)
                            <tr>
                                <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{$payment->payment_classification}}</td>
                                <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format($payment->amount, 2)}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format($contract_price, 2)}}</td>
                            </tr>
                        @else
                            <tr>
                                <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{$payment->payment_classification}}</td>
                                <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;W">{{$payment->paymenttype->payment}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$payment->reference_no}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$payment->or_no}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">--</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($payment->amount, 2)}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($contract_price, 2)}}</td>
                            </tr>
                        @endif
                        
                    @else
                        @if($payment->payment_classification !== 'MA')
                            <tr>
                                <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{ $payment->payment_classification }}</td>
                                <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"> {{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$payment->paymenttype->payment}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ $payment->reference_no }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ $payment->or_no }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($lot->monthly_amortization, 2) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format( $payment->amount, 2)}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format( $contract_price, 2)}}</td>
                            </tr>
                        @endif
                        {{-- @if($payment->payment_classification == 'MA')
                            <tr>
                                <td style="padding: 13px; width: 100px; text-align: left;">{{ $payment->payment_classification . ' ('. $payment->amortization->counter .')'}}</td>
                                <td style="padding: 13px; width: 100px; text-align: left;">{{ date('M d, Y', strtotime($payment->amortization->payment_date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;"> {{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">{{$payment->paymenttype->payment}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">{{ $payment->reference_no }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">{{ $payment->or_no }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format($lot->monthly_amortization, 2) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format( $payment->amount, 2)}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format( $contract_price, 2)}}</td>
                            </tr>
                        @else
                            <tr>
                                <td style="padding: 13px; width: 100px; text-align: left;">{{ $payment->payment_classification }}</td>
                                <td style="padding: 13px; width: 100px; text-align: left;">{{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;"> {{ date('M d, Y', strtotime($payment->date)) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">{{$payment->paymenttype->payment}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">{{ $payment->reference_no }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">{{ $payment->or_no }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format($lot->monthly_amortization, 2) }}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format( $payment->amount, 2)}}</td>
                                <td style="padding: 13px; width: 100px; text-align: right;">₱ {{ number_format( $contract_price, 2)}}</td>
                            </tr>
                        @endif --}}
                    @endif
                @endforeach
                @foreach ($amortizations as $amortization)
                @php
                    if($amortization->payment !== null) {
                        $contract_price = $contract_price - $amortization->payment['amount'];
                    }
                @endphp
                
                <tr>
                    <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{$amortization->payment_classification . ' ('.$amortization->counter .')'}}</td>
                    <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{ date('M d, Y', strtotime($amortization->payment_date)) }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$amortization->payment !== null?date('M d, Y', strtotime($amortization->payment['date'])):'--' }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$amortization->payment !== null?$amortization->payment['paymenttype']['payment']:'--' }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$amortization->payment !== null && $amortization->payment['reference_no'] !== null?$amortization->payment['reference_no']:'--' }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{$amortization->payment !== null?$amortization->payment['or_no']:'--' }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{$amortization->payment !== null?number_format($lot->monthly_amortization, 2):number_format($amortization->balance, 2) }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{$amortization->payment !== null?number_format($amortization->payment['amount'], 2):'0.00' }}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($contract_price, 2)}}</td>
                </tr>
            @endforeach
            </table>
        </div>
        <div class="spacer" style="height: 60px;"></div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 18px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">Totals</th>
                    <th style="padding: 13px; width: 100px; text-align: left; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($lot->tcp - $regular_amount_pay, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($regular_amount_pay, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($lot->tcp - $regular_amount_pay, 2)}}</th>
                </tr>
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr>
                    <td style="padding: 13px; width: 100px; text-align: left; text-decoration: underline;">Penalty/Others</td>
                    <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">Penalty Date</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Amount</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">O.R Date</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">O.R No.</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Amount Due</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Amount Paid</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Outstanding Balance</td>
                </tr>

                @foreach ($penalties as $penalty)
                @php
                    $total_penalty = $total_penalty + $penalty->amount;
                @endphp
                    <tr>
                        <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">PEN</td>
                        <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{$penalty->penalty_date}}</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ number_format($penalty->amount, 2)}}</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">-</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">-</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ number_format($penalty->amount, 2)}}</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">-</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">({{ number_format($total_penalty, 2)}})</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">Total</th>
                    <th style="padding: 13px; width: 100px; text-align: left; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($penalty_amount_due, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($penalty_amount_due, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($penalty_amount_pay, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                </tr>
            </table>
        </div>

        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr>
                    <td style="padding: 13px; width: 100px; text-align: left; text-decoration: underline; font-size: 18px;">Transfer Fee</td>
                    <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">Date</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Amount</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">O.R Date</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">O.R No.</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Amount Due</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Amount Paid</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">Outstanding Balance</td>
                </tr>

                @foreach ($transfer_fees as $transfer_fee)
                @php
                    $total_transfer_fee = $total_transfer_fee + $transfer_fee->amount;
                @endphp
                    <tr>
                        <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">TF</td>
                        <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">{{$transfer_fee->penalty_date}}</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ number_format($transfer_fee->amount, 2)}}</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">-</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">-</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ number_format($transfer_fee->amount, 2)}}</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">-</td>
                        <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">{{ number_format($total_transfer_fee, 2)}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr style="border-bottom: 2px solid; border-top: 2px solid;">
                    <th style="padding: 13px; width: 100px; text-align: left; font-size: 18px;">Total</th>
                    <th style="padding: 13px; width: 100px; text-align: left; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($transfer_fee_amount_due, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($transfer_fee_amount_due, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;">₱ {{ number_format($transfer_fee_amount_pay, 2)}}</th>
                    <th style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></th>
                </tr>
            </table>
        </div>

        <div class="row">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr>
                    <td style="padding: 13px; width: 100px; text-align: left; font-weight: bold; font-size: 18px;">Grand Total</td>
                    <td style="padding: 13px; width: 100px; text-align: left; font-size: 18px;"></td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-weight: bold; font-size: 18px;">₱ {{ number_format(($penalty_amount_due + $transfer_fee_amount_due) + ($lot->tcp - $regular_amount_pay), 2)}}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-weight: bold; font-size: 18px;">₱ {{ number_format($penalty_amount_pay + $regular_amount_pay + $transfer_fee_amount_pay, 2)}}</td>
                    <td style="padding: 13px; width: 100px; text-align: right; font-size: 18px;"></td>
                </tr>
            </table>
        </div>
    </div>

    {{-- MODAL --}}
<div class="modal fade" id="amortizationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Monthly Amortization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form id="modal-form" action="{{url('transaction/generate_amort/' . $id)}}" method="post">
                @csrf
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Reservation Date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" value="{{$lot->reservation_date}}" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Purchase Date<span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{$lot->reservation_date}}" required readonly>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">End Date<span style="color: red">*</span> ({{$get_months_pay->block->area_detail->no_months_pay." Months"}})</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{Carbon\Carbon::parse($lot->reservation_date)->addMonthsNoOverflow($get_months_pay->block->area_detail->no_months_pay)->format('Y-m-d')}}" required readonly>
                    <input type="hidden" id="no_month" name="no_month" value="{{$get_months_pay->block->area_detail->no_months_pay}}"/>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Transfer Fee<span style="color: red">*</span></label> (TCP: {{number_format($lot->tcp)}})
                    <div class="mb-2">
                        <button type="button" class="btn btn-sm btn-light" onclick="generateTransferFee({{$lot->tcp}}, 0.01)">1%</button>
                        <button type="button" class="btn btn-sm btn-light" onclick="generateTransferFee({{$lot->tcp}}, 0.015)">1.5%</button>
                        <button type="button" class="btn btn-sm btn-light" onclick="generateTransferFee({{$lot->tcp}}, 0.02)">2%</button>
                        <button type="button" class="btn btn-sm btn-light" onclick="generateTransferFee({{$lot->tcp}}, 0.025)">2.5%</button>
                        <button type="button" class="btn btn-sm btn-light" onclick="generateTransferFee({{$lot->tcp}}, 0.03)">3%</button>
                    </div>
                    <input type="number" class="form-control" step="any" id="transfer_fee" name="transfer_fee" placeholder="Transfer Fee" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-button">Generate</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <a onclick='printDiv();' class="float">
        <i class="fa fa-print my-float"></i>
    </a>
</div>

@endsection

@section('chart-js')
<script>
    $(function() {

        new Chart(document.getElementById("chartjs-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Last year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }, {
                    label: "This year",
                    backgroundColor: "#E8EAED",
                    borderColor: "#E8EAED",
                    hoverBackgroundColor: "#E8EAED",
                    hoverBorderColor: "#E8EAED",
                    data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });

        new Chart(document.getElementById("chartjs-pie"), {
            type: "pie",
            data: {
                labels: ["GRAND VILLAS FARM PHASE 1", "GRAND VILLAS FARM PHASE 2", "GRAND VILLAS FARM PHASE 2-B", "GRAND VILLAS FARM PHASE 3"],
                datasets: [{
                    data: [150, 125, 54, 146],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger,
                        "#E8EAED"
                    ],
                    borderColor: "transparent"
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                }
            }
        });

        new Chart(document.getElementById("chartjs-pie2"), {
            type: "pie",
            data: {
                labels: ["Antipolo", "Batangas", "Quezon City", "Zambales"],
                datasets: [{
                    data: [20, 2, 7, 11],
                    backgroundColor: [
                        window.theme.success,
                        window.theme.secondary,
                        window.theme.warning,
                        "#E8EAED"
                    ],
                    borderColor: "transparent"
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                }
            }
        });
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

    function generateTransferFee(tcp, percent) {
        var transfer_fee = tcp * percent;
        $('#transfer_fee').val(transfer_fee);
    }
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
