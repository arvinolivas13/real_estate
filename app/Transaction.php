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
}
