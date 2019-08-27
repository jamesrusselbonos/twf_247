<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'wallet',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'id' , 'updated_by');
    }   
    public function agent()
    {
        return $this->hasOne('App\Agent', 'id' , 'user_id');
    }   

    public function orders()
    {
        return $this->hasMany('App\Order', 'uid', 'id');
    }

    public function details()
    {
        return $this->hasMany('App\Details', 'id', 'uid');
    }

    public function roles()
       {
           return $this
               ->belongsToMany('App\Role')
               ->withTimestamps();
       }


       public function authorizeRoles($roles)
       {
         if ($this->hasAnyRole($roles)) {
           return true;
         }
         abort(401, 'This action is unauthorized.');
       }
       public function hasAnyRole($roles)
       {
         if (is_array($roles)) {
           foreach ($roles as $role) {
             if ($this->hasRole($role)) {
               return true;
             }
           }
         } else {
           if ($this->hasRole($roles)) {
             return true;
           }
         }
         return false;
       }
       public function hasRole($role)
       {
         if ($this->roles()->where('name', $role)->first()) {
           return true;
         }
         return false;
       }
}
