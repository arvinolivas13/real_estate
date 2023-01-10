<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'address',
        'type',
        'image',
        'status',
        'created_user',
    ];

    public function lot()
    {
        return $this->hasOne(AreaDetail::class);
    }
}
