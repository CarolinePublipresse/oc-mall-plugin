<?php namespace OFFLINE\Mall\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOfflineMallCustomerGroupPrices extends Migration
{
    public function up()
    {
        Schema::create('offline_mall_customer_group_prices', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('customer_group_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->integer('priceable_id')->unsigned();
            $table->string('priceable_type');
            $table->integer('price');
            $table->timestamps();

            $table->unique(['customer_group_id', 'priceable_id', 'priceable_type', 'currency_id'], 'unique_price');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('offline_mall_customer_group_prices');
    }
}
