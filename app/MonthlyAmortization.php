<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyAmortization extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'payment_id',
        'payment_date',
        'payment_classification',
        'amount',
        'balance',
        'counter',
        'status',
        'created_user',
    ];

    public function Penalty()
    {
        return $this->belongsTo(Penalty::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
