<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'seccions';
    protected $fillable = ['clase_id', 'seccion', 'file', 'name_file', 'texto', 'url', 'visibility', 'user_created', 'user_updated'];


    // public function comments()
    // {
    //    return $this->hasManyThrough(Comment::class, Post::class);
    // }


 	// public function clases()
  //   {
  //         return $this->hasMany(Clase::class);
  //   }
}
