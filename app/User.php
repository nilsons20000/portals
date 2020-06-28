<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword;
class User extends Authenticatable implements MustVerifyEmail{

    protected $dates = ['name_field'];

    use Notifiable;

    protected $fillable = [
       'id', 'name', 'email', 'password', 'role_id',  'provider', 'provider_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin(){
        return (boolean)$this->roles->where('name', 'admin')->count();
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function scopeLastUsers($query, $count){
      return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function scopeLastUsersToday($query, $count){
      return $query->whereDay('created_at','=',date('d'))->take($count)->get();
    }

    public function sendEmailVerificationNotification(){
       $this->notify(new VerifyEmail); // my notification
    }

    public function sendPasswordResetNotification($token){
       $this->notify(new ResetPassword($token));
    }


    public function articles(){
        return $this->hasMany('App\Article');
    }

     public function likes(){
      return $this->hasMany('App\Like');
    }



}