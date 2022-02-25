@extends('backend.master.index')

@section('title', 'Area')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Area</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <h3>List of Area</h3>
            <div class="area-container row">
                <div class="col-6">
                    <div class="area" style="background: url('/images/area/area_1.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">10/20</span>
                            <span class="area-name">Sample Area 1</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="area" style="background: url('/images/area/area_2.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">14/20</span>
                            <span class="area-name">Sample Area 2</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="area" style="background: url('/images/area/area_3.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">11/20</span>
                            <span class="area-name">Sample Area 3</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="area" style="background: url('/images/area/area_4.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">19/20</span>
                            <span class="area-name">Sample Area 4</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="area" style="background: url('/images/area/area_5.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">08/20</span>
                            <span class="area-name">Sample Area 5</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="area" style="background: url('/images/area/area_6.jpg')no-repeat;">
                        <div class="area-body">
                            <span class="area-count">03/20</span>
                            <span class="area-name">Sample Area 6</span>
                            <span class="area-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
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