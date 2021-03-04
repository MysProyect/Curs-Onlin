<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'classes';
    protected $fillable = ['curso_id', 'user_created', 'user_updated'];


}
