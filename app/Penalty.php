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
}
