@extends('backend.master.template')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <span>Dashboard</span>
@endsection

@section('content')
<div class="main">
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card flex-fill w-100 dashboard-greeting">
                <div class="card-body py-3">
                    <h1 class="card-title mb-0">Welcome {{ Auth::user()->firstname.' '.(Auth::user()->middlename !== null || Auth::user()->middlename !== ''?Auth::user()->middlename.' ':'').Auth::user()->lastname }}</h1>
                    <br>
                    <div class="card-details">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Commission</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-success-dark">
                                                <i class="fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="display-5 mt-1 mb-3">P 100,000.00</h1>
                                <div class="mb-0">
                                    Overall total commission
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Received Commission</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-success-dark">
                                                <i class="fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="display-5 mt-1 mb-3">P 50,000.00</h1>
                                <div class="mb-0">
                                    Overall total of received commission
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Property Sold</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-success-dark">
                                                <i class="fas fa-building"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="display-5 mt-1 mb-3">11</h1>
                                <div class="mb-0">
                                    Count of property sold
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Remaining Commission</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-success-dark">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="display-5 mt-1 mb-3">P 50,000.00</h1>
                                <div class="mb-0">
                                    Overall total of remaining commission
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Monthly Sales</h5>
                                <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as vertical bars.</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="chartjs-bar"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Property Sold</h5>
                                <h6 class="card-subtitle text-muted">Total property sold per project</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-pie"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Property per Location</h5>
                                <h6 class="card-subtitle text-muted">Number of properties per location</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-pie2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <a href="#" class="mr-1">
                                        <i class="align-middle" data-feather="refresh-cw"></i>
                                    </a>
                                    <div class="d-inline-block dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                                            <i class="align-middle" data-feather="more-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Latest Projects</h5>
                            </div>
                            <table id="datatables-dashboard-projects" class="table table-striped my-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="d-none d-xl-table-cell">Start Date</th>
                                        <th class="d-none d-xl-table-cell">End Date</th>
                                        <th>Status</th>
                                        <th class="d-none d-md-table-cell">Assignee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Project Apollo</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                        <td class="d-none d-md-table-cell">Carl Jenkins</td>
                                    </tr>
                                    <tr>
                                        <td>Project Fireball</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-danger">Cancelled</span></td>
                                        <td class="d-none d-md-table-cell">Bertha Martin</td>
                                    </tr>
                                    <tr>
                                        <td>Project Hades</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                        <td class="d-none d-md-table-cell">Stacie Hall</td>
                                    </tr>
                                    <tr>
                                        <td>Project Nitro</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-warning">In progress</span></td>
                                        <td class="d-none d-md-table-cell">Carl Jenkins</td>
                                    </tr>
                                    <tr>
                                        <td>Project Phoenix</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                        <td class="d-none d-md-table-cell">Bertha Martin</td>
                                    </tr>
                                    <tr>
                                        <td>Project X</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                        <td class="d-none d-md-table-cell">Stacie Hall</td>
                                    </tr>
                                    <tr>
                                        <td>Project Romeo</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                        <td class="d-none d-md-table-cell">Ashley Briggs</td>
                                    </tr>
                                    <tr>
                                        <td>Project Wombat</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-warning">In progress</span></td>
                                        <td class="d-none d-md-table-cell">Bertha Martin</td>
                                    </tr>
                                    <tr>
                                        <td>Project Zircon</td>
                                        <td class="d-none d-xl-table-cell">01/01/2018</td>
                                        <td class="d-none d-xl-table-cell">31/06/2018</td>
                                        <td><span class="badge badge-danger">Cancelled</span></td>
                                        <td class="d-none d-md-table-cell">Stacie Hall</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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