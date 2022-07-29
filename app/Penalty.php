<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penalty extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'monthly_amortization_id',
        'transaction_id',
        'penalty_date',
        'payment_classification',
        'amount',
        'status',
        'created_user',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function amortization()
    {
        return $this->belongsTo(MonthlyAmortization::class, 'monthly_amortization_id');
    }
}
