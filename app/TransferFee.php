<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferFee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'payment_date',
        'payment_classification',
        'amount',
        'status',
        'created_user',
    ];
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
