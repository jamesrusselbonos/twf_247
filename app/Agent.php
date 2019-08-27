<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    	protected $table = 'v_agents';
    	protected $primaryKey = 'id';
        protected $fillable = [

            'user_id', 'availability','duration',
        ];


        public function users()
           {
               return $this->belongsTo('App\User', 'user_id', 'id');
           }
}
