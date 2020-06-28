<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class System extends Model
{
	public $timestamps = false;
    protected $fillable = ['first_column','second_column','third_column'];

}
