<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->bigIncrements('pid'); 
            $table->string('image')->default('');
            $table->string('brand')->default('');
            $table->string('asin')->default('');
            $table->longText('product_page_link');
            $table->decimal('prime_low_price', 19, 2)->default('00.00');
            $table->integer('total_units_sold_mo')->default('0');
            $table->decimal('total_revenue_mo', 19, 2)->default('00.00');
            $table->integer('competitive_sellers')->default('0');
            $table->integer('our_sales_equity_units_mo')->default('0');
            $table->decimal('our_sales_equity_revenue_mo', 19, 2)->default('00.00');
            $table->longText('website_url');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->longText('address')->nullable(); 
            $table->string('contact_no')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
