<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
		protected $table = 'details';
		protected $primaryKey = 'id';
	    protected $fillable = [

	        'orderid', 'uid', 'pid', 
	          ];

    public function orders()
    {
        return $this->hasMany('App\Order', 'orderid', 'orderid');
    }    
    public function products()
    {
        return $this->belongsTo('App\Product', 'pid', 'pid');
    }    
    public function users()
    {
        return $this->belongsTo('App\User', 'id', 'uid');
    }
}
