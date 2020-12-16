<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->mediumText('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->mediumText('password')->nullable();
            $table->longText('remembertoken')->nullable();
            $table->string('referral')->nullable();
            $table->decimal('referral_point')->default("0")->nullable();
            $table->decimal('referral_amount')->default("0")->nullable();
            $table->string('referral_code')->nullable();
            $table->integer('shop_id')->nullable();
            $table->mediumText('user_profile_image')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
