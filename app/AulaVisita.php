<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AulaVisita extends Model
{	 
    protected $fillable = ['aula_id'];  

    public function visita()
    {
          return $this->hasOne(Aula::class);
    }
}
