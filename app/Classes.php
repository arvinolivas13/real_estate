<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'id',
        'company_id',
        'description',
        'tax_applicable',
        'government_mandated_benefits',
        'other_company_benefits'
    ];
}
