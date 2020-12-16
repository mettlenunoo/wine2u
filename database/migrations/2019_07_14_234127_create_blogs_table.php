<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('type');
            $table->longText('content')->nullable();
            $table->mediumText('pic')->nullable();
            $table->mediumText('video')->nullable();
            $table->mediumText('tag')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamp('publish');
            $table->string('featured')->nullable();
            $table->string('author')->nullable();
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('blog_product', function (Blueprint $table) {

            $table->integer('blog_id')->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->integer('product_id')->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();

        });


        Schema::create('blog_blogcategory', function (Blueprint $table) {

            $table->integer('blog_id')->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->integer('blogcategory_id')->foreign('blogcategory_id')->references('id')->on('blogcategories')->onDelete('cascade');
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
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('blog_product');
        Schema::dropIfExists('blog_blogcategory');
    }
}
