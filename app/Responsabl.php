<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsabl extends Model
{
    
    protected $table = 'responsabls';
    protected $fillable = [ 'cedula','name','last_name', 'email', 'telef', 'NroWp', 'user_created', 'user_updated' ];
}
