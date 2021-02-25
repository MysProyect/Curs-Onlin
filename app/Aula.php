<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ['part_id', 'curso_id', 'email', 'usuario', 'password'];  



    public function part()
	{
		return $this->belongsTo(Participant::class);
	}

	public function curso()
    {
       	 return $this->belongsTo(Curso::class);
    }

    public function visitas()
    {
          return $this->hasMany(AulaVisita::class);
    }













}
