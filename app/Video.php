<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'path_thumbnail', 'yid', 'category'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
      }
}
