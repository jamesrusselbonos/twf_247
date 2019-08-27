<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
	    'name', 'email', 'password', 'wallet',
	];
	
    public function users()
       {
           return $this
               ->belongsToMany('App\User')
               ->withTimestamps();
       }
}
