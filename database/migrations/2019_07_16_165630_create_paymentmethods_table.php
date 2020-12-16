<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentmethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rave')->nullable();
            $table->mediumText('rave_api')->nullable();
            $table->string('paypal')->nullable();
            $table->mediumText('paypal_api')->nullable();
            $table->string('paystack')->nullable();
            $table->mediumText('paystack_api')->nullable();
            $table->string('cash_on_delivery')->nullable();
            $table->integer('shop_id')->nullable();
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
        Schema::dropIfExists('paymentmethods');
    }
}
