<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'customer_id',
        'code',
        'type',
        'attachment',
        'status',
        'created_user',
        'updated_user',
    ];
}
