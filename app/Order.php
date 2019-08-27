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

       public function details()
       {
           return $this->belongsTo('App\Details', 'orderid', 'orderid');
       }
       public function users()
       {
           return $this->belongsTo('App\User');
       }
}
