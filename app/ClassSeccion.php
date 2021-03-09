<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSeccion extends Model
{
    protected $table = 'class_seccions';
    protected $fillable = ['class_id', 'seccion', 'file', 'name_file', 'texto', 'url', 'user_created', 'user_updated'];


    // public function comments()
    // {
    //    return $this->hasManyThrough(Comment::class, Post::class);
    // }


 	// public function clases()
  //   {
  //         return $this->hasMany(Clase::class);
  //   }
}
