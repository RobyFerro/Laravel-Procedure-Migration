<?php

namespace ikdev\procedure_migration\app;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'procedure_migrations';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    
}
