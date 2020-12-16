<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePairingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pairings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('parent');
            $table->integer('position');
            $table->string('publish');
            $table->longText('content')->nullable();
            $table->mediumText('image');
            $table->integer('blog_id')->foreign('blog_id')->references('id')->on('blogs');
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('pairing_product', function (Blueprint $table) {
            $table->integer('pairing_id')->foreign('pairing_id')->references('id')->on('pairings')->onDelete('cascade');
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
        Schema::dropIfExists('pairings');
    }
}
