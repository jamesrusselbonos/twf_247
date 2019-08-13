<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    	protected $table = 'orders';
    	protected $primaryKey = 'orderid';
        protected $fillable = [
        	'pid', 'uid',
        ];

        // public function product()
        // {
        //     return $this->belongsTo('App\Product', 'pid', 'pid');
        // }
        // public function user()
        // {
        //     return $this->belongsTo('App\User', 'uid', 'id');
        // }
}
