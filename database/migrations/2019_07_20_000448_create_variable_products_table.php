<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variable_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('attribute_id')->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->default("0");
            $table->string('sku')->nullable();
            $table->integer('quantity')->default("1");
            $table->string('stock');
            $table->decimal('weight')->default("0");
            $table->decimal('product_lenght')->default("0");
            $table->decimal('product_width')->default("0");
            $table->decimal('product_height')->default("0");
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
        Schema::dropIfExists('variable_products');
    }
}
