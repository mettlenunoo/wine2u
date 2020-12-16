<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('code');
            $table->string('type');
            $table->decimal('value')->nullable();
            $table->decimal('percent_off')->nullable();
            $table->string('usage')->nullable();
            $table->date('valid_date')->nullable();
            $table->date('end_date');
            $table->string('country_id');
            $table->string('status');
            $table->mediumText('details')->nullable();
            $table->integer('total_used')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
