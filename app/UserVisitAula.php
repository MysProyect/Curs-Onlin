<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVisitAula extends Model
{
    protected $table = 'user_visit_aulas';
    protected $fillable = ['user_aula_id', 'visita'];  

    public $timestamps = false;

    public function user_aula()
    {
          return $this->belongsTO(UserAula::class);
    }

}
