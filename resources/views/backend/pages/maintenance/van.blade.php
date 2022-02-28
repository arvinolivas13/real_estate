@extends('backend.master.index')

@section('title', 'Vans')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span><a href="/transaction/area" style="color:#fff;">Information</a></span> / <span class="highlight">Vans</span>
@endsection


@section('content')
<div class="main">
<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container van-header">
            <div class="card">
                <div class="card-header">
                    <h3>Van Information</h3>
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#positionModal" style="float:right">
                        Add Van
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
                    <h5 class="card-title">Model: Toyota HIACE 2021</h5>
                    <p class="card-text">Plate No. 2020-0001</p>
                    <a href="#" class="btn btn-primary view-details" data-toggle="modal" data-target=".bd-example-modal-lg">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
            <img class="card-img-top" src="{{asset('images/van2.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Model: Toyota HIACE</h5>
                    <p class="card-text">Plate No. 2020-0002</p>
                    <a href="#" class="btn btn-primary view-details" data-toggle="modal" data-target=".bd-example-modal-lg">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
            <img class="card-img-top" src="{{asset('images/van3.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Model: Toyota HIACE 2018</h5>
                    <p class="card-text">Plate No. 2020-0003</p>
                    <a href="#" class="btn btn-primary view-details" data-toggle="modal" data-target=".bd-example-modal-lg">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
            <img class="card-img-top" src="{{asset('images/van4.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Model: Toyota HIACE 2016</h5>
                    <p class="card-text">Plate No. 2020-0004</p>
                    <a href="#" class="btn btn-primary view-details" data-toggle="modal" data-target=".bd-example-modal-lg">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
            <img class="card-img-top" src="{{asset('images/van5.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Model: Toyota HIACE</h5>
                    <p class="card-text">Plate No. 2020-0005</p>
                    <a href="#" class="btn btn-primary view-details" data-toggle="modal" data-target=".bd-example-modal-lg">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" style="height:100%;">
        <div class="container">
            <div class="card">
            <img class="card-img-top" src="{{asset('images/van6.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Model: Nissan NV3500</h5>
                    <p class="card-text">Plate No. 2020-0006</p>
                    <a href="#" class="btn btn-primary view-details" data-toggle="modal" data-target=".bd-example-modal-lg">View Details</a>
                </div>
            </div>
        </div>
    </div>
   
    </div>
</div>

<!-- MODAL -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
            <h1 class="van-info">Model: Nissan NV3500</h1>
            <span class="van-info">Plate No.: 2020-0001</span>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-4">
                <img class="card-img-top" src="{{asset('images/van-interior1.png')}}" alt="Card image cap">
                </div>
                <div class="col-4">
                <img class="card-img-top" src="{{asset('images/van-interior2.png')}}" alt="Card image cap">
                </div>
                <div class="col-4">
                <img class="card-img-top" src="{{asset('images/van-interior3.png')}}" alt="Card image cap">
                </div>
                <div class="col-12">
                    <div class="van-information">
                    <div>
                        <p>Since hitting the market in 2002, the Turkish-built Ford Transit Connect has amassed just over one million sales. The first generation was utilitarian and thirsty, but it was also the first small European panel van to go on sale in the US. The second generation, introduced in 2013, is a lot more refined and comfortable.</p>
                        <div class="row">
                            <div class="col-6">
                            <p><span class="info-lable">Driver:</span> Juan Dela Cruz</p>
                            </div>
                            <div class="col-6">
                            <p><span class="info-lable">Capacity:</span> 18PAX</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
               
                
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script>
   </script>
@endsection

@yield('leaves_tab')

@section('styles')
<style>
span.info-lable {
    font-size: 18px;
    font-weight: bold;
}
.van-information>div>p {
    padding-top: 15px;
}
.van-information {
    margin: 15px 0px;
    border-top: 1px solid;
}
.van-info {
    color: white;
}

.card-title {
    margin-bottom: 0;
}
.container.van-header {
    padding: 0px !important;
    /* width: 100%; */
    /* max-width: 100%; */
}
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