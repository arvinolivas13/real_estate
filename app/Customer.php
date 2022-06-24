<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'subscriber_no',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'address',
        'contact',
        'birthday',
        'occupation',
        'gender',
        'status',
        'created_user'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
