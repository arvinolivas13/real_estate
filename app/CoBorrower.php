<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoBorrower extends Model
{
    protected $fillable = [
        'lot_id',
        'name',
        'created_by',
        'updated_by'
    ];
}
