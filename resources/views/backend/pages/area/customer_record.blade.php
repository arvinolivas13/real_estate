@extends('backend.master.index')

@section('title', 'Area')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span class="highlight">Area</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <h3>Customer Record</h3>
            <table id="customer_record" class="stripe"></table>
        </div>
    </div>
</div>

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        var employee_id = '';
        $(function() {
            var data = [
                {
                    "name": "Airi Satou",
                    "province": "Metro Manila",
                    "city": "Quezon City",
                    "contact_number": "09123456789",
                    "email": "airi.satou@gmail.com",
                    "date_purchased":"2011/08/09"
                }
            ];
            var column = [
                { data: 'name', title: "Hello" },
                { data: 'province' },
                { data: 'city' },
                { data: 'contact_number' },
                { data: 'email' },
                { data: 'date_purchased' }
            ]
            scion.create.static_table('customer_record', data, column);
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