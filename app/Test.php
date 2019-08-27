<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    	protected $table = 'tests';
    	protected $primaryKey = 'id';
        protected $fillable = [

            'pid', 'uid', 'testfield',
        ];
}
