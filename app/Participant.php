<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [ 'cedula','name','last_name', 'email', 'telef', 'NroWp', 'user_updated'  ];
}
