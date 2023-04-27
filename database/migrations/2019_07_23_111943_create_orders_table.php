<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('quantity')->nullable();
            $table->longText('ship_to')->nullable();
            $table->decimal('totalamount')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('complete_status')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('ship_code')->nullable();
            $table->string('country')->nullable();
            $table->mediumText('coupon_code')->nullable();
            $table->decimal('coupon_amount')->nullable();
            $table->decimal('shipping_amt')->nullable();
            $table->mediumText('tracking_code')->nullable();
            $table->decimal('taxes')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
