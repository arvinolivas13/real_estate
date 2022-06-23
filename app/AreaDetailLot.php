<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaDetailLot extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'block_id',
        'lot',
        'area',
        'psqm',
        'tcp',
        'reservation_percent',
        'reservation_fee',
        'balance',
        'monthly_amortization',
        'status',
        'created_user',
    ];

    public function lot()
    {
        return $this->belongsTo(AreaDetail::class);
    }
}