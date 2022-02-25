<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'company_name',
        'email',
        'contact_number',
        'address',
        'legal_name',
        'tin',
        'company_logo',
        'theme',
        'created_by',
        'updated_by'
    ];
}
