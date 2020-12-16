<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('parent');
            $table->integer('position');
            $table->string('publish');
            $table->longText('content')->nullable();
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('offer_product', function (Blueprint $table) {
            $table->integer('offer_id')->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->integer('product_id')->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
