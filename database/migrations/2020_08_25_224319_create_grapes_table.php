<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('grapes', function (Blueprint $table) {
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

        Schema::create('grape_product', function (Blueprint $table) {
            $table->integer('grape_id')->foreign('grape_id')->references('id')->on('grapes')->onDelete('cascade');
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
        Schema::dropIfExists('grapes');
    }
}
