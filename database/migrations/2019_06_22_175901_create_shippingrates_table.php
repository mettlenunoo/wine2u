<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('kg');
            $table->decimal('zone1')->nullable();
            $table->decimal('zone2')->nullable();
            $table->decimal('zone3')->nullable();
            $table->decimal('zone4')->nullable();
            $table->decimal('zone5')->nullable();
            $table->decimal('zone6')->nullable();
            $table->decimal('zone7')->nullable();
            $table->decimal('zone8')->nullable();
            $table->string('type')->nullable();
            $table->string('publish')->nullable();
            $table->integer('country_id');
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
        Schema::dropIfExists('shippingrates');
    }
}
