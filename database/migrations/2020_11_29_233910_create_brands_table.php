<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('position');
            $table->string('publish');
            $table->longText('content')->nullable();
            $table->mediumText('image')->nullable();
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('brand_product', function (Blueprint $table) {

            $table->integer('brand_id')->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('brands');
        Schema::dropIfExists('brand_product');
    }
}
