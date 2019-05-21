<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    	protected $table = 'products';
    	protected $primaryKey = 'pid';
        protected $fillable = [

            'brand', 'asin', 'product_page_link', 'prime_low_price', 'total_units_sold_mo', 'total_revenue_mo', 'competitive_sellers', 'our_sales_equity_units_mo', 'our_sales_equity_revenue_mo', 'website_url', 'firstname', 'lastname', 'address', 'contact_no', 'position', 'email',
        ];


        public function sold()
        {
            return $this->hasMany('App\Sold', 'pid', 'pid');
        }
}
