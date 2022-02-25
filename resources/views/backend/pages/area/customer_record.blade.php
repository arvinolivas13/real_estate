@extends('backend.master.index')

@section('title', 'Area')

@section('breadcrumbs')
    <span>Transaction</span>  /  <span><a href="/transaction/area" style="color:#fff;">Area</a></span> / <span class="highlight">Customer Record</span>
@endsection


@section('content')

<div class="row" style="height:100%;">
    <div class="col-12" style="height:100%;">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Customer Record</h3>
                </div>
                <div class="card-body">
                    <table id="customer_record" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Province</th>
                                <th>City</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                                <th>Date Purchased</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="customer_reports" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <h1 class="customer-name">Sample Data</h1>
                </div>
                <div class="col-4">
                    <div class="balance-data">
                        <span class="label">Total Contract Price</span>
                        <span class="total">P 2,000,000.00</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="balance-data">
                        <span class="label">Balance</span>
                        <span class="total">P 1,530,005.00</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="balance-data">
                        <span class="label">Total Payment</span>
                        <span class="total">P 469,995</span>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <table id="customer_reports_table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Transaction Number</th>
                                <th>Payment Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Reference Number</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
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
                },
                {
                    "name": "Angelica Ramos",
                    "province": "Metro Manila",
                    "city": "Quezon City",
                    "contact_number": "09234567891",
                    "email": "angelica.ramos@gmail.com",
                    "date_purchased":"2010/10/09"
                },
                {
                    "name": "Ashton Cox",
                    "province": "Metro Manila",
                    "city": "Caloocan City",
                    "contact_number": "09123456789",
                    "email": "ashton.cox@gmail.com",
                    "date_purchased":"2012/12/20"
                },
                {
                    "name": "Bradley Greer",
                    "province": "Rizal",
                    "city": "Antipolo",
                    "contact_number": "09995557892",
                    "email": "bradley.greer@gmail.com",
                    "date_purchased":"2020/10/09"
                },
                {
                    "name": "Bruno Nash",
                    "province": "Rizal",
                    "city": "Antipolo",
                    "contact_number": "09113456789",
                    "email": "bruno.nash@gmail.com",
                    "date_purchased":"2021/08/10"
                },
                {
                    "name": "Cedric Kelly",
                    "province": "Pampanga",
                    "city": "San Fernando",
                    "contact_number": "09826528900",
                    "email": "cedric.kelly@gmail.com",
                    "date_purchased":"2020/10/09"
                },
                {
                    "name": "Finn Camacho",
                    "province": "Zambales",
                    "city": "Iba",
                    "contact_number": "09997260012",
                    "email": "finn.camacho@gmail.com",
                    "date_purchased":"2011/08/09"
                },
                {
                    "name": "Garret Winters",
                    "province": "Metro Manila",
                    "city": "Quezon City",
                    "contact_number": "09234658791",
                    "email": "garret.winters@gmail.com",
                    "date_purchased":"2020/10/09"
                },
                {
                    "name": "Gavin Joyce",
                    "province": "Metro Manila",
                    "city": "Quezon City",
                    "contact_number": "09988223246",
                    "email": "gavin.joyce@gmail.com",
                    "date_purchased":"2020/08/09"
                },
                {
                    "name": "Haley Kennedy",
                    "province": "Batangas",
                    "city": "Batangas City",
                    "contact_number": "09123456789",
                    "email": "haley.kennedy@gmail.com",
                    "date_purchased":"2011/01/27"
                },
                {
                    "name": "Lael Greer",
                    "province": "Metro Manila",
                    "city": "Quezon City",
                    "contact_number": "09096547821",
                    "email": "lael.greer@gmail.com",
                    "date_purchased":"2020/03/25"
                }
            ];
            var column = [
                { data: 'name', title: "Name" },
                { data: 'province', title: "Province"  },
                { data: 'city', title: "City"  },
                { data: 'contact_number', title: "Contact Number"  },
                { data: 'email', title: "Email Address"  },
                { data: 'date_purchased', title: "Date Purchased"  }
            ];

            var data2 = [
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'Gcash',
                    'date': '2021/10/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'Gcash',
                    'date': '2021/09/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BDO',
                    'date': '2021/08/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/08/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/07/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'Gcash',
                    'date': '2021/06/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/05/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/04/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/03/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/02/28',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2021/01/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2020/12/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2020/11/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2020/10/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                },
                {
                    'transaction_no': '2020-'+scion.create.random(8),
                    'payment_type': 'BPI',
                    'date': '2020/09/30',
                    'amount': 'P 31,333.33',
                    'reference_no': scion.create.random(8)
                }
            ];
            
            var column2 = [
                { data: 'date', title: "Date"  },
                { data: 'transaction_no', title: "Transaction Number" },
                { data: 'payment_type', title: "Payment Type"  },
                { data: 'amount', title: "Amount"  },
                { data: 'reference_no', title: "Reference Number"  }
            ];

            scion.create.static_table('customer_record', data, column, true);
            scion.create.static_table('customer_reports_table', data2, column2, false);
            
            $('body').delegate('#customer_record tbody tr','click', function () {
                var data = $('#customer_record').DataTable().row(this).data();
                console.log(data);
                
                $('.customer-name').text(data.name);
                $('#customer_reports').modal('show');
            });
        });

    </script>
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