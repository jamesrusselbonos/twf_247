<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    	protected $table = 'solds';
    	protected $primaryKey = 'id';
        protected $fillable = [

            'pid', 'uid',
        ];

        public function product()
        {
            return $this->belongsTo('App\Product', 'pid', 'pid');
        }
        public function user()
        {
            return $this->belongsTo('App\User', 'uid', 'id');
        }

}
