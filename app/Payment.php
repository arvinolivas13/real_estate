<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'monthly_amortization_id',
        'code',
        'date',
        'payment_id',
        'payment_classification',
        'amount',
        'reference_no',
        'or_no',
        'attachment',
        'remarks',
        'created_user',
    ];

    public function transaction_record()
    {
        return $this->belongsTo(Transaction::class, 'code');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function process_by()
    {
        return $this->belongsTo(User::class, 'created_user');
    }

    public function paymenttype()
    {
        return $this->belongsTo(PaymentType::class, 'payment_id');
    }

    public function amortization()
    {
        return $this->belongsTo(MonthlyAmortization::class, 'monthly_amortization_id');
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'co_borrower_id', 'id');
    }
}
