<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'file_name',
        'lot_id',
        'co_borrower_id',
        'type',
        'status',
        'created_by',
        'updated_by',
    ];
}
