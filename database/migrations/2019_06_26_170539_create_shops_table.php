<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name');
            $table->mediumText('country')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode_zip')->nullable();
            $table->string('currency')->nullable();
            $table->string('type_0f_shop')->nullable();
            $table->longText('logo')->nullable();
            $table->string('selling_product')->nullable();
            $table->string('status')->nullable();
            $table->decimal('tax')->default("0");
            $table->decimal('referral_point_per_use')->default("0");
            $table->decimal('referral_amount_per_point')->default("0");
            $table->timestamps();
        });

        DB::table('shops')->insert([
            ['shop_name' => 'Shop GH', 'country' => 'GH','address_1' => 'East Legon','address_2' => 'Null','city' => 'Accra','postcode_zip' => '+233','currency' => 'GHS','type_0f_shop' => 'both','logo' => 'skin-gourmet-uk-1569007983.jpg','selling_product' => 'NULL','status' => 'Pending','created_at' =>  \Carbon\Carbon::now(),'tax' => '0.00','Referral_point_per_use' => '0.00','Referral_amount_per_point' => '0.00', 'updated_at' =>  \Carbon\Carbon::now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
