<?php

namespace App;

use IlluminateDatabaseEloquentModel;

use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function post(){
      return $this->belongsTo('App\Article');
    }
}