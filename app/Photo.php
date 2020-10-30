<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title', 'path', 'slug', 'category','parent'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
      }
}
