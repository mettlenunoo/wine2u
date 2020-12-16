<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpresspayAndHubtelToPaymentmethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paymentmethods', function (Blueprint $table) {
            $table->string('express_pay')->nullable();
            $table->mediumText('expresspay_api')->nullable();
            $table->string('hubtel')->nullable();
            $table->mediumText('hubtel_api')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paymentmethods', function (Blueprint $table) {
            $table->dropColumn('express_pay');
            $table->dropColumn('expresspay_api');
            $table->dropColumn('hubtel');
            $table->dropColumn('hubtel_api');
        });
    }
}
