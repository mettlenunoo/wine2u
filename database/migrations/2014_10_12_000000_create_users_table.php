<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('bio')->nullable();
            $table->mediumText('pic')->nullable();
            $table->string('phone')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('shop_id')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

         
        DB::table('users')->insert([
            ['name' => 'Dawud Abdul Manan', 'email' => 'dabdulmanan@gmail.com','password' => '$2y$10$pd0Jtj2v4wbDebV9vYOwUeszAc0f6o1Pj/2VbLu3EQLN231I4CV/a','phone' => '020922029','type' => 'Super Administrator','status' => 'Active','shop_id' => '1', 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' =>  \Carbon\Carbon::now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
