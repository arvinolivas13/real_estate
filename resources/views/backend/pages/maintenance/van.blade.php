@extends('backend.master.index')

@section('title', 'Vans')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span><a href="/transaction/area" style="color:#fff;">Information</a></span> / <span class="highlight">Vans</span>
@endsection


@section('content')
<div class="main">
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Van Information</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#positionModal" style="float:right">
                        Add Agent
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
            <img class="card-img-top" src="{{asset('images/van1.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Agent Information</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#positionModal" style="float:right">
                        Add Agent
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Agent Information</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#positionModal" style="float:right">
                        Add Agent
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   
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