<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'customer_id',
        'lot_id',
        'starting_date',
        'duration',
        'status',
        'created_user',
    ];

    public function lot()
    {
        return $this->belongsTo(AreaDetailLot::class, 'lot_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function penalty()
    {
        return $this->belongsTo(Penalty::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'code');
    }

}
