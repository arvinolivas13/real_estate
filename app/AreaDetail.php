<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'area_id',
        'block',
        'status',
        'created_user',
    ];

    public function lot()
    {
        return $this->hasMany(AreaDetailLot::class, 'block_id');
    }
}
