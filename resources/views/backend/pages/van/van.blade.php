@extends('backend.master.index')

@section('title', 'Van Availability')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Van Availability</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <h3>List of Van Availability</h3>
            <div class="area-container row">
                <div class="col-12">
                    <div class="van row">
                        <div class="col-xl-4 col-lg-4 col-sm-12 van-img" style="background:url('/images/van/van-1.jpg');min-height: 250px">
                            <span class="status">Available</span>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                            <div class="van-model">Ford Transit Connect - 2002</div>
                            <hr>
                            <div class="van-details">
                                Since hitting the market in 2002, the Turkish-built Ford Transit Connect has amassed just over one million sales. The first generation was utilitarian and thirsty, but it was also the first small European panel van to go on sale in the US. The second generation, introduced in 2013, is a lot more refined and comfortable.
                            </div>
                            <div class="van-other-details">
                                <span>
                                    <b>Driver:</b> John Dela Cruz
                                </span>
                                <span>
                                    <b>Capacity:</b> 6 slot
                                </span>
                                <span class="plate-number">
                                    <b>Plate No.:</b> HVM 110
                                </span>
                            </div>
                            <div class="van-action text-right">
                                <button class="btn btn-primary" onclick="location.href='/transaction/van/schedule'">Check Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="van row">
                        <div class="col-xl-4 col-lg-4 col-sm-12 van-img" style="background:url('/images/van/van-2.jpg');min-height: 250px">
                            <span class="status">Available</span>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                            <div class="van-model">VW Caddy (1978-Present)</div>
                            <hr>
                            <div class="van-details">
                                Despite its image firmly tied in Europe, the Volkswagen Caddy started out life as a VW Golf-based pickup in the US. Now into its fourth generation (as of 2015), the Volkswagen Caddy has sold over 1.5 million units since its launch and is the best-seller in a number of markets, including Australia.
                            </div>
                            <div class="van-other-details">
                                <span>
                                    <b>Driver:</b> Robert Pascua
                                </span>
                                <span>
                                    <b>Capacity:</b> 7 slot
                                </span>
                                <span class="plate-number">
                                    <b>Plate No.:</b> HNC 261
                                </span>
                            </div>
                            <div class="van-action text-right">
                                <button class="btn btn-primary">Check Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="van row">
                        <div class="col-xl-4 col-lg-4 col-sm-12 van-img" style="background:url('/images/van/van-3.jpg');min-height: 250px">
                            <span class="status">Available</span>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                            <div class="van-model">Renault Trafic (1981-Present)</div>
                            <hr>
                            <div class="van-details">
                                Renault manufactures more vans in Europe than any other firm, and the Renault Trafic is a great contributor to this success. Manufacturing took place in France for the first generation (1981-2000), then it was split between Spain and the UK for the second generation (2001-2014), before returning back to Spain for the third generation.
                            </div>
                            <div class="van-other-details">
                                <span>
                                    <b>Driver:</b> Marlon Balce
                                </span>
                                <span>
                                    <b>Capacity:</b> 8 slot
                                </span>
                                <span class="plate-number">
                                    <b>Plate No.:</b> W-139-FT
                                </span>
                            </div>
                            <div class="van-action text-right">
                                <button class="btn btn-primary">Check Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="van row">
                        <div class="col-xl-4 col-lg-4 col-sm-12 van-img" style="background:url('/images/van/van-4.jpg');min-height: 250px">
                            <span class="status not-available">Not Available</span>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                            <div class="van-model">HIACE Cargo</div>
                            <hr>
                            <div class="van-details">
                                he perfect balance of practicality and contemporary design.
                            </div>
                            <div class="van-other-details">
                                <span>
                                    <b>Driver:</b> Jude Opinion
                                </span>
                                <span>
                                    <b>Capacity:</b> 10 slot
                                </span>
                                <span class="plate-number">
                                    <b>Plate No.:</b> RFV 120
                                </span>
                            </div>
                            <div class="van-action text-right">
                                <button class="btn btn-primary">Check Schedule</button>
                            </div>
                        </div>
                    </div>
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
        });

    </script>
@endsection

@yield('leaves_tab')

@section('styles')
<style>
.van {
    padding: 20px;
    background: #fff;
    margin-bottom: 10px;
}
.van-model {
    font-size: 23px;
    font-weight: bold;
    color: #2e9e5b;
}
.van-details {
    font-size: 14px;
    color: gray;
}
.van-other-details {
    padding: 15px 0;
}
.van-other-details>span {
    display: block;
}
.van-img {
    background-position: center center !important;
    background-size: cover !important;
}
span.status {
    padding: 5px 10px;
    display: inline-block;
    background: #2e9e5b;
    font-size: 9px;
    color: #fff;
    text-transform: uppercase;
    border-radius: 25px;
    margin: 10px 0;
}
span.status.not-available {
    background: red;
}
span.plate-number {
    background: #0095ff;
    display: inline-block;
    color: #fff;
    padding: 3px 5px;
    font-size: 12px;
    border-radius: 3px;
    margin-top: 10px;
}
</style>
@endsection
@stop