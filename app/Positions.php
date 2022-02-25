<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $fillable = [
        'id',
        'company_id',
        'description'
    ];
}
