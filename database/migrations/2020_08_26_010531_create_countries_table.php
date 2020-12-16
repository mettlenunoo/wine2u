<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->integer('parent');
            $table->longText('content')->nullable();
            $table->mediumText('banner')->nullable();
            $table->mediumText('flag')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamp('publish');
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('country_product', function (Blueprint $table) {
            
            $table->integer('country_id')->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('country_product');
        Schema::dropIfExists('countries');
    }
}
