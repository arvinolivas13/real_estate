@extends('backend.master.template')

@section('title', 'Customers')

@section('breadcrumbs')
    <span><a href="#" style="color:#fff;">Home</a></span> / <span class="highlight">Contracts</span>
@endsection


@section('content')
<div class="main">
<div class="row">
    @include('backend.partial.flash-message')
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Transaction Information</h3>
                </div>
                <div class="card-body">
                    <table id="customer_record" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Transaction Code</th>
                                <th>Area</th>
                                <th>Slot</th>
                                <th>Customer Name</th>
                                <th>Area</th>
                                <th>TCP</th>
                                <th>P/SQM</th>
                                <th>Monthly Amortization</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <a href="#" class="align-middle" onclick="contract({{ $transaction->id }})" title="Print" id={{$transaction->id}}><i class="align-middle fas fa-fw fa-file-word"></i></a>
                                    </td>
                                    <td>{{$transaction->code}}</td>
                                    <td>{{$transaction->lot->block->area_detail->name}}</td>
                                    <td>{{'BLOCK - ' . $transaction->lot->block->block . ' LOT ' . $transaction->lot->lot}}</td>
                                    <td>{{$transaction->customer->firstname . ' ' . $transaction->customer->middlename . ' ' . $transaction->customer->lastname}}</td>
                                    <td>{{$transaction->lot->area}}</td>
                                    <td>₱ {{ number_format($transaction->lot->tcp, 2) }}</td>
                                    <td>₱ {{ number_format($transaction->lot->psqm, 2) }}/ SQM</td>
                                    <td>₱ {{ number_format($transaction->lot->monthly_amortization, 2) }} / Mon</td>
                                    <td>{{$transaction->lot->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

@include('backend.partial.component.attachment')
@include('backend.partial.printing.contract')

</div>
@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script>
        function printDiv() {
            var myStyle = '<link rel="stylesheet" href="/backend/css/modern.css" />';
            var divToPrint=document.getElementById('printable-area');
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write(myStyle + '<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
            newWin.document.close();
            // setTimeout(function(){newWin.close();},10);
        };

        // American Numbering System
        var th = ['','thousand','million', 'billion','trillion'];
        // uncomment this line for English Number System
        // var th = ['','thousand','million', 'milliard','billion'];

        var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

        function contract(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/document/show/' + id,
                method: 'get',
                success: function(data) {
                    var customer = data.transaction.customer;
                    var lot = data.transaction.lot;
                    var words = toWords(lot.area);
                    var tcp_word = toWords(lot.tcp);
                    var tcp = lot.tcp;
                    $('#buyer_name, .buyer_name').text(customer.firstname + ' ' + customer.middlename + ' ' + customer.lastname)
                    $('#address').text(customer.address);
                    $('#area').text(words + '(' + lot.area + ')');
                    $('#area_address').text('BLOCK ' + lot.block + ' Lot ' + lot.lot);
                    $('#tcp').text(tcp_word + ' (Php' + (lot.tcp * 1).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ') Pesos;');
                    $('#reservation').text((lot.tcp * .05).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                    $('#amortization').text((lot.monthly_amortization * 1).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                    $('#specific_date').text(moment(lot.purchase_date).format('Do'));
                    $('#starting_date').text(moment(lot.purchase_date).format('MMMM of YYYY'));
                    $('#ending_date').text(moment(lot.end_date).format('MMMM of YYYY'));
                    $('#transfer_fee').text((lot.tcp * .02).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

                    printDiv();
                }
            });
        }
        $(function() {
            $('#customer_record').DataTable({
                scrollX: true,
            });

            $('#printable-area').hide();
        });

    </script>
@endsection

@section('styles')
    <style>
        table.dataTable td {
            padding: 3px 10px;
            width: 1px;
            white-space: nowrap;
        }
        thead th {
             white-space: nowrap;
        }

        .modal-header h5 {
            color: #fff;
            margin: 0px;
        }

        iframe#pdf_attachment {
            width: 100%;
            height: 100%;
        }

        .list-item ul {
            padding: 0px;
            list-style: none;
            margin: 0px;
        }

        .attachment-content {
            height: 100%;
        }

        .list-item li a {
            padding: 10px;
            display: block;
            margin-bottom: 2px;
            background: #eee;
            color: #2e759e;
            font-family: system-ui;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none !important;
        }

        img#image_attachment {
            width: 100%;
        }

        .no_attachment {
            padding: 10px;
            background: #eee;
            text-align: center;
        }
    </style>
@endsection
@stop
