<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'lot_id',
        'payment_date',
        'payment_type',
        'payment_classification',
        'amount',
        'reference_no',
        'or_no',
        'attachment',
        'remarks',
        'created_user',
    ];
}
