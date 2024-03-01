var transaction_id = null;
var lot_id = null;
var ammort_id = null;

$(function() {
    $('#transaction_record').DataTable({
        scrollX: true,
    });
})

function selectTransaction(id) {
    var transaction_html = "";
    var amort = "";
    $.get('/admin_control/get/'+id, function(response) {
        transaction_html += "<div class='transaction-item'>";
            transaction_html += "<div class='code'><b>Code:</b> "+response.transaction.code+"</div>";
            transaction_html += "<div class='trans-info'>Block "+response.transaction.lot.block.block+" Lot "+response.transaction.lot.lot+"</div>";
            transaction_html += "<div class='trans-date'>"+moment(response.transaction.starting_date).format('MMM DD, YYYY')+"</div>";
        transaction_html += "</div>";

        $.each(response.amortization, (i,v) => {
            amort += "<div class='amort-item'>";
                amort += "<div class='row'>";
                    amort += "<div class='classification col-4'>"+v.payment_classification+"("+v.counter+")</div>";
                    amort += "<div class='amort-date col-2 text-right'>"+moment(v.payment_date).format('MMM DD, YYYY')+"</div>";
                    amort += "<div class='amort-amount col-2 text-right' style='font-weight:bold;'>"+currency(v.amount)+"</div>";
                    amort += "<div class='amort-balance col-2 text-right' style='font-weight:bold;' id='bal_"+v.id+"'>"+currency(v.balance)+"</div>";
                    amort += "<div class='amort-statu col-2 text-right' style='font-weight:bold;' id='amort_"+v.id+"'>"+(v.status !== "PAID"?"<span class='open-a'>CLOSE</span>":"<span class='close-a' onclick='closeAmortization("+v.id+")'>OPEN</span>")+"</div>";
                amort += "</div>";
            amort += "</div>";
        });

        transaction_id = response.transaction_id;
        lot_id = response.lot_id;

        $('.transaction_name').val(response.transaction.code);
        $('#transactionList').modal('hide');
        $('.transaction').html(transaction_html);
        $('.amortization').html(amort);
    });

}


function currency(total) {
    var neg = false;
    if(total < 0) {
        neg = true;
        total = Math.abs(total);
    }
    return (neg ? "-₱ " : '₱ ') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
}

function deleteRecord() {
    if($('.transaction_name').val() !== "") {
        $('#confirmModal').modal('show');
    }
    else {
        alert('Please select a transaction');
    }
}

function yesDelete() {
    $.get('/admin_control/destroy/'+transaction_id+"/"+lot_id, function() {
        
        transaction_id = null;
        lot_id = null;

        $('.transaction_name').val('');
        $('#transactionList').modal('hide');
        $('.transaction').html('<div class="no-record">No Record Found</div>');
        $('.amortization').html('<div class="no-record">No Record Found</div>');
        
        $('#confirmModal').modal('hide');

        toastr.success("Data has been deleted");
    });
}

function closeAmortization(id) {
    ammort_id = id;
    $('#closeConfirm').modal('show');
}

function yesClose(){
    $.post('/admin_control/close_amortization/' + ammort_id, {_token:$('meta[name="csrf-token"]').attr('content')}).done(function(response) {
        $('#amort_'+ammort_id).html("<span class='open-a'>OPEN</span>");
        $('#bal_'+ammort_id).text(currency(response.balance));
        $('#closeConfirm').modal('hide');
        ammort_id = null;
        toastr.success("Data has been updated");
    });
}