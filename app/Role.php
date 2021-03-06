<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','id', 'role_id','user_id'];

    public $timestamps = false;

    public function users(){
        return $this->hasMany(User::class);
    }
}