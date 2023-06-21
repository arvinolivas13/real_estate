<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRoles extends Model
{
    protected $fillable = [
        'role_id',
        'model_type',
        'model_id'
    ];

    protected $table = 'model_has_roles';
    public $timestamps = false;
    
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
