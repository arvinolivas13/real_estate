@extends('backend.master.template')

@section('title', 'E-SOA')

@section('breadcrumbs')
    <span>E-SOA</span>
@endsection

@section('content')
<div class="main">
    <div class="main-container" style="background: white; padding: 10px 40px;">
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
            <p style="margin-bottom: 30px;"></p>
        </div>
        <div class="row" style="border-top: 2px solid;">
            <p style="margin-bottom: 20px;"></p>
            <table style="width: 100%; font-size: 12px;">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                </tr>
                <tr>
                    <td style="text-align: left;">RES</td>
                    <td style="text-align: left;">10/28/2022</td>
                    <td style="text-align: right;">0.00</td>
                    <td style="text-align: right;">10/28/2022</td>
                    <td style="text-align: right;">0148</td>
                    <td style="text-align: right;">CASH</td>
                    <td style="text-align: right;">11,900.00</td>
                    <td style="text-align: right;">11,900.00</td>
                    <td style="text-align: right;">227,900.00</td>
                </tr>
                <tr>
                    <td style="text-align: left;">MA</td>
                    <td style="text-align: left;">11/28/2022</td>
                    <td style="text-align: right;">5,675.00</td>
                    <td style="text-align: right;">11/28/2022</td>
                    <td style="text-align: right;">0149</td>
                    <td style="text-align: right;">CASH</td>
                    <td style="text-align: right;">5,675.00</td>
                    <td style="text-align: right;">5,675.00</td>
                    <td style="text-align: right;">222,135.00</td>
                </tr>
            </table>
        </div>
    </div>
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
</script>
@endsection

@section('styles')
<style>
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