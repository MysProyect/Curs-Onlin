<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSeccion extends Model
{
    protected $table = 'class_seccions';
    protected $fillable = ['class_id', 'seccion', 'file', 'texto', 'url', 'user_created', 'user_updated'];

 

}
