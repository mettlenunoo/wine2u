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
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('more_description')->nullable();
            $table->mediumText('img1')->nullable();
            $table->mediumText('img2')->nullable();
            $table->mediumText('video')->nullable();
            $table->string('tag')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamp('publish');
            $table->string('featured')->nullable();
            $table->decimal('light')->nullable()->default('0.0');
            $table->decimal('smooth')->nullable()->default('0.0');
            $table->decimal('dry')->nullable()->default('0.0');
            $table->decimal('soft')->nullable()->default('0.0');
            $table->decimal('base_price')->nullable()->default('0.0');
            $table->string('country_id')->foreign('country_id')->references('id')->on('shops')->onDelete('cascade');
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
